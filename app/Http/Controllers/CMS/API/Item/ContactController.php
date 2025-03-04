<?php

namespace App\Http\Controllers\CMS\API\Item;

use App\Http\Controllers\Controller;
use App\Models\CMS\item\ItemContact;
use Illuminate\Http\Request;
use App\Mail\CMS\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    protected $mySelf;
    protected $myParent;
    protected $paramsPaginate;
    protected $paginate;

    public function __construct(ItemContact $mySelf)
    {
        $this->mySelf = $mySelf;
        $this->myParent = $this->mySelf->category();
        $this->paramsPaginate = [
            'itemPerPage' => 20,
            'page' => 1,
            'columns' => ['*'],
        ];
        $this->paginate = true;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            // $params = [
            //     ['a', '=', '...'],
            //     ['b', '=', '...'],
            //     ['c', '>', ...],
            // ];
            $params = $request->all();
            if(isset($params['page'])){
                $this->paramsPaginate['page'] = $params['page'];
                unset($params['page']);
            }
            if(isset($params['paginate']) and !$params['paginate']){
                $this->paginate == $params['paginate'];
            }
            $data = $this->mySelf->getAll($params, $this->paginate, $this->paramsPaginate);
            return response()->json([
                'success' => true,
                'data' => $data,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $data = $this->mySelf->create($data);
            if($data){
                Mail::to($data['email'])->send(new Contact($data));
            }
            return response()->json([
                'success' => true, 
                'data' => $data, 
                'message' => "Created success"
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false, 
                'message' => $th->getMessage(), 
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $data = $this->mySelf->find($id);
            if (!$data) {
                return response()->json([
                    'success' => false,
                    'message' => 'Not found',
                ], 404);
            }
            return response()->json([
                'success' => true,
                'data' => $data,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = $request->all();
            $oldData = $this->mySelf->find($id);
            if (!$oldData) {
                return response()->json([
                    'success' => false,
                    'message' => 'Not found',
                ], 404);
            }
    
            // Cập nhật thông tin category
            $oldData->fill($data);
            $oldData->save();
    
            return response()->json([
                'success' => true,
                'data' => $oldData,
                'message' => 'Updated Success',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = $this->mySelf->find($id);
            $deleted = $data->delete();
            if ($deleted) {
                return response()->json([
                    'success' => true,
                    'message' => 'Deleted Success'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Not found or can not delete'
                ], 404);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Get category parent of this category.
     */
    public function category()
    {
        try {
            $data = $this->mySelf->category();
            if (!$data) {
                return response()->json([
                    'success' => false,
                    'message' => 'Not found parent category',
                ], 404);
            }
            return response()->json([
                'success' => true,
                'data' => $data,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Store contact for client and send mail
     */
    public function storeAndSendMail(Request $request, $sendMail = true)
    {
        try {
            $response = $this->store($request);
            if ($response->getData()->success and $sendMail and $request->get('email')) {
                Mail::to($request->get('email'))->queue(new Contact($request->all()));
            }
            return response()->json([
                'success' => true, 
                'data' => $response, 
                'message' => "Created success and sended mail"
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false, 
                'message' => $th->getMessage(), 
            ], 500);
        }
    }
}
