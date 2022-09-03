import Swal from 'sweetalert2'

export default class {

    static main(title, timer = 3000, icon = 'error', background = '#dc3545', classColorName = "text-light", position = 'bottom-start')
    {
        const Toast = Swal.mixin({
            toast: true,
            position,
            showConfirmButton: false,
            timer,
            timerProgressBar: true,
            iconColor: '#fff',
            showCloseButton: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    
        Toast.fire({
            icon,
            title,
            background
        })

        this.setClassColor(classColorName)
    }

    static success(title, timer = 3000, position = 'bottom-start')
    {
        const Toast = Swal.mixin({
            toast: true,
            position,
            showConfirmButton: false,
            timer,
            timerProgressBar: true,
            iconColor: '#fff',
            showCloseButton: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    
        Toast.fire({
            icon: 'success',
            title,
            background: '#198754'
        })

        this.setClassColor()
    }

    static error(title, timer = 3000, position = 'bottom-start')
    {
        const Toast = Swal.mixin({
            toast: true,
            position,
            showConfirmButton: false,
            timer,
            timerProgressBar: true,
            iconColor: '#fff',
            showCloseButton: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    
        Toast.fire({
            icon: 'error',
            title,
            background: 'rgba(220, 38, 38, 1)'
        })

        this.setClassColor()
    }

    static warning(title, timer = 3000, position = 'bottom-start')
    {
        const Toast = Swal.mixin({
            toast: true,
            position,
            showConfirmButton: false,
            timer,
            timerProgressBar: true,
            iconColor: '#fff',
            showCloseButton: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    
        Toast.fire({
            icon: 'error',
            title,
            background: '#ffc107'
        })

        this.setClassColor()
    }

    static setClassColor(name = 'text-white') {
        const elements = document.querySelectorAll('.Swal2-popup.Swal2-toast .Swal2-title')
        elements.forEach(el => el.classList.add(name))
    }
}