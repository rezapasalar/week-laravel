import Swal from 'sweetalert2'

export default class {

    static questionDelete(html = 'آیا مطمئنید که میخواهید حذف کنید؟', confirmButtonText = 'بله', cancelButtonText = 'خیر')
    {
        return new Promise((resolve) => {
            return Swal.fire({
                icon: 'question',
                html,
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonText,
                cancelButtonText
            }).then(result => {
                if(result.isConfirmed) {
                    return resolve(true)
                }
    
                return resolve(false)
            })
        })
    }

    static successWot(title = 'موفق آمیز', text = 'عملیات با موفقیت صورت گرفت', confirmButtonText = 'متوجه شدم',)
    {
        Swal.fire({
            icon: 'success',
            title,
            text,
            showCancelButton: false,
            confirmButtonText
        })
    }
}