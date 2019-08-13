import MobileMenu from './modules/MobileMenu';
import RevealOnScroll from './modules/RevealOnScroll';
import $ from 'jquery';
import StickyHeader from './modules/StickyHeader';
import Modal from './modules/Modal';
import SmoothScroll from './modules/SmoothScroll';

var mobileMenu = new MobileMenu();
new RevealOnScroll($(".rotate"), "90%");
new RevealOnScroll($(".headline--body"), "70%");
new RevealOnScroll($(".headline--image"), "70%");
new RevealOnScroll($(".performance-item"), "60%");
new RevealOnScroll($("input"), "70%");
new RevealOnScroll($("textarea"), "70%");
new RevealOnScroll($(".btn--submit"), "70%");
new RevealOnScroll($("#emailList"), "90%");
new RevealOnScroll($(".btn--submit-red"), "90%");

var stickyHeader = new StickyHeader();
var modal = new Modal();