export function getRouteIndex(routeCurrent) {
    switch (routeCurrent.name) {
        case "cms.asset.index":
            routeCurrent.titleLower = "asset";
            routeCurrent.titleUcfirst = "Asset";
            routeCurrent.nameComponentCreate = "cms.asset.create";
            routeCurrent.nameComponentEdit = "cms.asset.edit";
            
            routeCurrent.nameAPI = "cms/api/asset";
            break;
        case "cms.classification.index":
            routeCurrent.titleLower = "classification";
            routeCurrent.titleUcfirst = "Classification";
            routeCurrent.nameComponentCreate = "cms.classification.create";
            routeCurrent.nameComponentEdit = "cms.classification.edit";
            
            routeCurrent.nameAPI = "cms/api/classification";
            break;
        case "cms.collection.index":
            routeCurrent.titleLower = "collection";
            routeCurrent.titleUcfirst = "Collection";
            routeCurrent.nameComponentCreate = "cms.collection.create";
            routeCurrent.nameComponentEdit = "cms.collection.edit";
            
            routeCurrent.nameAPI = "cms/api/collection";
            break;
        case "cms.page.index":
            routeCurrent.titleLower = "page";
            routeCurrent.titleUcfirst = "Page";
            routeCurrent.nameComponentCreate = "cms.page.create";
            routeCurrent.nameComponentEdit = "cms.page.edit";
            
            routeCurrent.nameAPI = "cms/api/page";
            break;
        case "cms.module.index":
            routeCurrent.titleLower = "module";
            routeCurrent.titleUcfirst = "Module";
            routeCurrent.nameComponentCreate = "cms.module.create";
            routeCurrent.nameComponentEdit = "cms.module.edit";
            
            routeCurrent.nameAPI = "cms/api/module";
            break;
        case "cms.form.index":
            routeCurrent.titleLower = "form";
            routeCurrent.titleUcfirst = "Form";
            routeCurrent.nameComponentCreate = "cms.form.create";
            routeCurrent.nameComponentEdit = "cms.form.edit";
            
            routeCurrent.nameAPI = "cms/api/form";
            break;
        case "cms.global.index":
            routeCurrent.titleLower = "glbal";
            routeCurrent.titleUcfirst = "Global";
            routeCurrent.nameComponentCreate = "cms.global.create";
            routeCurrent.nameComponentEdit = "cms.global.edit";
            
            routeCurrent.nameAPI = "cms/api/global";
            break;
        case "cms.navigation.index":
            routeCurrent.titleLower = "navigation";
            routeCurrent.titleUcfirst = "Navigation";
            routeCurrent.nameComponentCreate = "cms.navigation.create";
            routeCurrent.nameComponentEdit = "cms.navigation.edit";
            
            routeCurrent.nameAPI = "cms/api/navigation";
            break;
        case "cms.other.index":
            routeCurrent.titleLower = "other";
            routeCurrent.titleUcfirst = "Other";
            routeCurrent.nameComponentCreate = "cms.other.create";
            routeCurrent.nameComponentEdit = "cms.other.edit";
            
            routeCurrent.nameAPI = "cms/api/other";
            break;
        default:
            break;
    }
    return routeCurrent
}

export function getRouteEdit(routeCurrent) {
    switch (routeCurrent.name) {
        case "cms.asset.edit":
            routeCurrent.titleLower = "asset";
            routeCurrent.titleUcfirst = "Asset";
            routeCurrent.nameComponentCreate = "cms.asset.create";
            routeCurrent.nameComponentIndex = "cms.asset.index";
            
            routeCurrent.nameAPI = "cms/api/asset";
            break;
        case "cms.classification.edit":
            routeCurrent.titleLower = "classification";
            routeCurrent.titleUcfirst = "Classification";
            routeCurrent.nameComponentCreate = "cms.classification.create";
            routeCurrent.nameComponentIndex = "cms.classification.index";
            
            routeCurrent.nameAPI = "cms/api/classification";
            break;
        case "cms.collection.edit":
            routeCurrent.titleLower = "collection";
            routeCurrent.titleUcfirst = "Collection";
            routeCurrent.nameComponentCreate = "cms.collection.create";
            routeCurrent.nameComponentIndex = "cms.collection.index";
            
            routeCurrent.nameAPI = "cms/api/collection";
            break;
        case "cms.page.edit":
            routeCurrent.titleLower = "page";
            routeCurrent.titleUcfirst = "Page";
            routeCurrent.nameComponentCreate = "cms.page.create";
            routeCurrent.nameComponentIndex = "cms.page.index";
            
            routeCurrent.nameAPI = "cms/api/page";
            break;
        case "cms.module.edit":
            routeCurrent.titleLower = "module";
            routeCurrent.titleUcfirst = "Module";
            routeCurrent.nameComponentCreate = "cms.module.create";
            routeCurrent.nameComponentIndex = "cms.module.index";
            
            routeCurrent.nameAPI = "cms/api/module";
            break;
        case "cms.form.edit":
            routeCurrent.titleLower = "form";
            routeCurrent.titleUcfirst = "Form";
            routeCurrent.nameComponentCreate = "cms.form.create";
            routeCurrent.nameComponentIndex = "cms.form.index";
            
            routeCurrent.nameAPI = "cms/api/form";
            break;
        case "cms.global.edit":
            routeCurrent.titleLower = "glbal";
            routeCurrent.titleUcfirst = "Global";
            routeCurrent.nameComponentCreate = "cms.global.create";
            routeCurrent.nameComponentIndex = "cms.global.ediindext";
            
            routeCurrent.nameAPI = "cms/api/global";
            break;
        case "cms.navigation.edit":
            routeCurrent.titleLower = "navigation";
            routeCurrent.titleUcfirst = "Navigation";
            routeCurrent.nameComponentCreate = "cms.navigation.create";
            routeCurrent.nameComponentIndex = "cms.navigation.index";
            
            routeCurrent.nameAPI = "cms/api/navigation";
            break;
        case "cms.other.edit":
            routeCurrent.titleLower = "other";
            routeCurrent.titleUcfirst = "Other";
            routeCurrent.nameComponentCreate = "cms.other.create";
            routeCurrent.nameComponentIndex = "cms.other.index";
            
            routeCurrent.nameAPI = "cms/api/other";
            break;
        default:
            break;
    }
    return routeCurrent
}

export function getRouteCreate(routeCurrent) {
    switch (routeCurrent.name) {
        case "cms.asset.create":
            routeCurrent.titleLower = "asset";
            routeCurrent.titleUcfirst = "Asset";
            routeCurrent.nameComponentIndex = "cms.asset.index";
            routeCurrent.nameComponentEdit = "cms.asset.edit";
            
            routeCurrent.nameAPI = "cms/api/asset";
            break;
        case "cms.classification.create":
            routeCurrent.titleLower = "classification";
            routeCurrent.titleUcfirst = "Classification";
            routeCurrent.nameComponentIndex = "cms.classification.index";
            routeCurrent.nameComponentEdit = "cms.classification.edit";
            
            routeCurrent.nameAPI = "cms/api/classification";
            break;
        case "cms.collection.create":
            routeCurrent.titleLower = "collection";
            routeCurrent.titleUcfirst = "Collection";
            routeCurrent.nameComponentIndex = "cms.collection.index";
            routeCurrent.nameComponentEdit = "cms.collection.edit";
            
            routeCurrent.nameAPI = "cms/api/collection";
            break;
        case "cms.page.create":
            routeCurrent.titleLower = "page";
            routeCurrent.titleUcfirst = "Page";
            routeCurrent.nameComponentIndex = "cms.page.index";
            routeCurrent.nameComponentEdit = "cms.page.edit";
            
            routeCurrent.nameAPI = "cms/api/page";
            break;
        case "cms.module.create":
            routeCurrent.titleLower = "module";
            routeCurrent.titleUcfirst = "Module";
            routeCurrent.nameComponentIndex = "cms.module.index";
            routeCurrent.nameComponentEdit = "cms.module.edit";
            
            routeCurrent.nameAPI = "cms/api/module";
            break;
        case "cms.form.create":
            routeCurrent.titleLower = "form";
            routeCurrent.titleUcfirst = "Form";
            routeCurrent.nameComponentIndex = "cms.form.index";
            routeCurrent.nameComponentEdit = "cms.form.edit";
            
            routeCurrent.nameAPI = "cms/api/form";
            break;
        case "cms.global.create":
            routeCurrent.titleLower = "glbal";
            routeCurrent.titleUcfirst = "Global";
            routeCurrent.nameComponentIndex = "cms.global.index";
            routeCurrent.nameComponentEdit = "cms.global.edit";
            
            routeCurrent.nameAPI = "cms/api/global";
            break;
        case "cms.navigation.create":
            routeCurrent.titleLower = "navigation";
            routeCurrent.titleUcfirst = "Navigation";
            routeCurrent.nameComponentIndex = "cms.navigation.index";
            routeCurrent.nameComponentEdit = "cms.navigation.edit";
            
            routeCurrent.nameAPI = "cms/api/navigation";
            break;
        case "cms.other.create":
            routeCurrent.titleLower = "other";
            routeCurrent.titleUcfirst = "Other";
            routeCurrent.nameComponentIndex = "cms.other.index";
            routeCurrent.nameComponentEdit = "cms.other.edit";
            
            routeCurrent.nameAPI = "cms/api/other";
            break;
        default:
            break;
    }
    return routeCurrent
}

