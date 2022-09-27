require('./bootstrap');
require('./ckeditor');
require('./truncate');
require('./back-to-top');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import * as truncate from "./truncate";
import * as backToTop from "./back-to-top";

document.addEventListener(`DOMContentLoaded`, () => {
    truncate.init();
    backToTop.init();
});