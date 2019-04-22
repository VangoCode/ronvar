import MobileMenu from './modules/MobileMenu';
import RevealOnScroll from './modules/RevealOnScroll';
import $ from 'jquery';
import StickyHeader from './modules/StickyHeader';

var mobileMenu = new MobileMenu();
new RevealOnScroll($(".rotate"), "90%");
new RevealOnScroll($(".headline"), "80%");
new RevealOnScroll($(".headline--body"), "70%");
new RevealOnScroll($(".performance--header"), "85%");
new RevealOnScroll($(".performance-item"), "60%");

var stickyHeader = new StickyHeader();