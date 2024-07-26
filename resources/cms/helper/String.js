export function removeTones(str) {
    const accentsMap = {
        a: 'áàạảãâấầậẩẫăắằặẳẵ',
        e: 'éèẹẻẽêếềệểễ',
        i: 'íìịỉĩ',
        o: 'óòọỏõôốồộổỗơớờợởỡ',
        u: 'úùụủũưứừựửữ',
        y: 'ýỳỵỷỹ',
        d: 'đ',
        A: 'ÁÀẠẢÃÂẤẦẬẨẪĂẮẰẶẲẴ',
        E: 'ÉÈẸẺẼÊẾỀỆỂỄ',
        I: 'ÍÌỊỈĨ',
        O: 'ÓÒỌỎÕÔỐỒỘỔỖƠỚỜỢỞỠ',
        U: 'ÚÙỤỦŨƯỨỪỰỬỮ',
        Y: 'ÝỲỴỶỸ',
        D: 'Đ'
    };

    for (let key in accentsMap) {
        for (let char of accentsMap[key]) {
            str = str.replace(new RegExp(char, 'g'), key);
        }
    }

    return str;
}

export function convertToSnakeCase(str) {
    str = removeTones(str); // Loại bỏ dấu tiếng Việt
    return str
        .toLowerCase()                // Chuyển đổi tất cả các ký tự thành chữ thường
        .replace(/\s+/g, '_')         // Thay thế tất cả các khoảng trắng bằng dấu gạch dưới
        .replace(/[^a-z0-9_]/g, '');  // Loại bỏ tất cả các ký tự không phải là chữ cái, số, hoặc dấu gạch dưới
}


export function slugify(str) {
    // Loại bỏ dấu tiếng Việt và chuyển đổi thành chữ thường
    str = removeTones(str).toLowerCase();

    // Thay thế các khoảng trắng và ký tự đặc biệt bằng dấu gạch ngang
    str = str.replace(/[^\w\s-]/g, ''); // Loại bỏ ký tự không phải là chữ cái, số, dấu gạch ngang, hoặc khoảng trắng
    str = str.replace(/\s+/g, '-');     // Thay thế khoảng trắng bằng dấu gạch ngang
    str = str.replace(/--+/g, '-');     // Loại bỏ các dấu gạch ngang liên tiếp
    str = str.replace(/^-+|-+$/g, '');  // Loại bỏ dấu gạch ngang ở đầu và cuối chuỗi
    
    return str;
}