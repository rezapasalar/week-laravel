import './bootstrap';

import Alpine from 'alpinejs';

import lozad from 'lozad';

import SweetAlert from './modules/SweetAlert';

import SweetToast from './modules/SweetToast';

import Helpers from './modules/Helpers';

import './modules/Swiper';

import scrollToProducts from './modules/ScrollToProducts';

scrollToProducts(lozad);

lozad().observe();

window.Alpine = Alpine;

window.Swal = SweetAlert;

window.Toast = SweetToast;

window.Helpers = Helpers;

Alpine.start();

window.addEventListener('toast:success', (e) => setTimeout(() => Toast.success(e.detail.message, e.detail.timer, e.detail.position), 1000));

window.addEventListener('toast:error', (e) => setTimeout(() => Toast.error(e.detail.message, e.detail.timer, e.detail.position), 1000));

window.addEventListener('alert-wot:success', (e) => setTimeout(() => Swal.successWot(e.detail.title, e.detail.message, e.detail.confirmButtonText), 1000));

window.addEventListener('scroll:top', (e) => window.scrollTo({top: 0, behavior: 'smooth'}));

window.addEventListener('body:overflow-y-hidden', (e) => document.body.classList.add('overflow-y-hidden'));





