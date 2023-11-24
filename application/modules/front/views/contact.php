
<style>

 
.default-form .form-group input[type="text"], 
.default-form .form-group input[type="email"], 
.default-form .form-group input[type="password"], 
.default-form .form-group input[type="tel"], 
.default-form .form-group input[type="url"], 

.default-form .form-group input[type="file"], 
.default-form .form-group input[type="number"],
 .default-form .form-group textarea,
  .default-form .form-group select {
    position: relative;
    display: block;
    height: 54px;
    width: 100%;
    font-size: 16px;
    color: #25283a;
    line-height: 30px;
    font-weight: 400;
    padding: 11px 20px;
    background-color: #ffffff;
    border: 1px solid #e0e0e0;
    border-radius: 3px;
    -webkit-transition: all 300ms ease;
    -ms-transition: all 300ms ease;
    -o-transition: all 300ms ease;
    -moz-transition: all 300ms ease;
    transition: all 300ms ease;
}
	.page-banner {
    position: relative;
    color: #ffffff;
    text-align: center;
    padding: 180px 0px 80px;
    background-color: #25283a;
    z-index: 2;

}
.page-banner .image-layer {
    position: absolute;
    left: 0px;
    top: 0;
    width: 100%;
    height: 100%;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
}
.auto-container {
    position: static;
    max-width: 1200px;
    padding: 0px 15px;
    margin: 0 auto;
}
.page-banner .breadcrumb-box {
    position: relative;
    left: 0;
    bottom: 0;
    width: 100%;
    text-align: left;
    margin: 0 0 20px;
}
.page-banner h1 {
    position: relative;
    font-size: 72px;
    line-height: 1.2em;
    font-weight: 700;
    margin-bottom: 15px;
    color: #ffffff;
    text-transform: capitalize;
    text-align: left;
}
.page-banner .auto-container {
    position: relative;
    z-index: 1;
}
.auto-container {
    position: static;
    max-width: 1200px;
    padding: 0px 15px;
    margin: 0 auto;
}

.page-banner .bread-crumb {
    position: relative;
    display: inline-block;
}
ul, li {
    list-style: none;
    padding: 0px;
    margin: 0px;
}

===================================================================
	Contact Section
====================================================================


.contact-section{
	position:relative;
	padding: 170px 0px 0px;
	z-index: 1;
}

.contact-section.contact-page{
	padding: 100px 0px 0px;
}

.contact-section .map-image-layer,
.contact-section .map-layer,
.contact-section .map-layer .map-canvas{
	position:absolute;
	left:0;
	top:0;
	width:100%;
	height: 100%;
	opacity:1;
	background-repeat: no-repeat;
	background-position: center center;
	background-size: cover;
}

.contact-section .content-box{
	position: relative;
	top: 70px;
	padding: 0;
	padding-right: 420px;
	background: #fd5d14;
	box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.05);
}

.contact-section.contact-page .content-box{
	top: -64px;
}

.contact-section .content-box .image-layer{
	position: absolute;
	right: 0;
	top: 0;
	width: 420px;
	height: 100%;
	background-size: cover;
	background-position: center center;
	background-repeat: no-repeat;
}
.contact-section .content-box .image-layer:before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgb(0 0 0 / 0%);
}
.contact-section .form-box{
	position: relative;
	padding: 65px 70px 45px;
	    background: #06202b;
	color: #ffffff;
}

.contact-section .form-box .row{
	margin: 0px -10px;
}

.contact-section .form-box .form-group{
	margin-bottom: 20px;
	padding: 0px 10px;
}

.contact-section .form-box .form-group input, .contact-section .form-box .form-group select, .contact-section .form-box .form-group textarea {
    border-color: rgb(7 33 44);
    background: none;
    color: #ffffff;
    max-height: 100px;
    background: #585858;
}

.sec-title h2 {
    position: relative;
    display: block;
    font-size: 40px;
    line-height: 1.15em;
    color: #ffff;
    font-weight: 700;
    text-transform: capitalize;
    margin-bottom: 30px;
}
.contact-section .info-box{
	position: absolute;
	right: 0;
	bottom: 65px;
	width: 100%;
	padding: 25px 20px 22px 70px;
	background: #ffffff;
	color: #2f333c;
	line-height: 1.5em;
	font-weight: 500;
}

.contact-section .info-box .subtitle{
	position: relative;
	display: block;
	margin-bottom: 5px;
}

.contact-section .info-box .phone{
	position: relative;
	display: block;
	font-size: 30px;
	font-weight: 700;
	line-height: 1.4em;
}

.contact-section .info-box .phone a{
	position: relative;
	color: #2f333c;
}

.contact-section .info-box .phone .icon{
	padding-right: 5px;
	vertical-align: middle;
}

.contact-section .info-blocks{
	position: relative;
}

.contact-section .info-blocks .info-block{
	position: relative;
	text-align: center;
	margin-bottom: 30px;
}

.contact-section .info-block .inner {
    position: relative;
    display: block;
    padding: 45px 20px 40px;
    background: #ffffff;
    box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.10);
}

.contact-section .info-block .icon{
	position: relative;
	display: block;
	margin-bottom: 20px;
}

.contact-section .info-block strong{
	display: block;
	margin-bottom: 15px;
}

.contact-section .info-block ul li{
	display: block;
	font-size: 18px;
	line-height: 1.5em;
}

.contact-section .info-block ul li a{
	color: #222222;
}

.contact-section .info-block ul li a:hover{
	color: #fd5d14;
	text-decoration: underline;
}

@media only screen and (max-width: 600px){
.mobile-menu .navigation li.mrli {
   /* display:none; */
}
.mobile-menu .nav-logo img{
	width:120px;
}
.nav-outer .mobile-nav-toggler {
    padding-left: 20px;
}
}
.elementor-574 .elementor-element.elementor-element-d22f189 {
    padding: 100px 0px 80px 0px;
}

.elementor-574 .elementor-element.elementor-element-108e9fe .elementor-icon-wrapper {
    text-align: center;
}

.elementor-574 .elementor-element.elementor-element-108e9fe.elementor-view-stacked .elementor-icon {
    background-color: #00b7c5;
}

.elementor-574 .elementor-element.elementor-element-108e9fe.elementor-view-framed .elementor-icon, 
.elementor-574 .elementor-element.elementor-element-108e9fe.elementor-view-default .elementor-icon {
    color: #00b7c5;
    border-color: #00b7c5;
}

.elementor-574 .elementor-element.elementor-element-108e9fe.elementor-view-framed 
.elementor-icon, .elementor-574 .elementor-element.elementor-element-108e9fe.elementor-view-default 
.elementor-icon svg {
    fill: #00b7c5;
}

.elementor-574 .elementor-element.elementor-element-108e9fe .elementor-icon {
    font-size: 74px;
}

.elementor-574 .elementor-element.elementor-element-436ca38 {
    text-align: center;
    color: #020202;
}

.elementor-574 .elementor-element.elementor-element-d08a706 .elementor-icon-wrapper {
    text-align: center;
}

.elementor-574 .elementor-element.elementor-element-d08a706.elementor-view-stacked .elementor-icon {
    background-color: #00b7c5;
}

.elementor-574 .elementor-element.elementor-element-d08a706.elementor-view-framed .elementor-icon, .elementor-574 .elementor-element.elementor-element-d08a706.elementor-view-default .elementor-icon {
    color: #00b7c5;
    border-color: #00b7c5;
}

.elementor-574 .elementor-element.elementor-element-d08a706.elementor-view-framed .elementor-icon, .elementor-574 .elementor-element.elementor-element-d08a706.elementor-view-default .elementor-icon svg {
    fill: #00b7c5;
}

.elementor-574 .elementor-element.elementor-element-d08a706 .elementor-icon {
    font-size: 74px;
}

.elementor-574 .elementor-element.elementor-element-3ac5c9c {
    text-align: center;
    color: #020202;
}

.elementor-574 .elementor-element.elementor-element-2d10c87 .elementor-icon-wrapper {
    text-align: center;
}

.elementor-574 .elementor-element.elementor-element-2d10c87.elementor-view-stacked .elementor-icon {
    background-color: #00b7c5;
}

.elementor-574 .elementor-element.elementor-element-2d10c87.elementor-view-framed .elementor-icon, .elementor-574 .elementor-element.elementor-element-2d10c87.elementor-view-default .elementor-icon {
    color: #00b7c5;
    border-color: #00b7c5;
}

.elementor-574 .elementor-element.elementor-element-2d10c87.elementor-view-framed .elementor-icon, .elementor-574 .elementor-element.elementor-element-2d10c87.elementor-view-default .elementor-icon svg {
    fill: #00b7c5;
}

.elementor-574 .elementor-element.elementor-element-2d10c87 .elementor-icon {
    font-size: 74px;
}

.elementor-574 .elementor-element.elementor-element-79f4c0c {
    text-align: center;
    color: #020202;
}

.elementor-574 .elementor-element.elementor-element-6c8c08e .contact-info-section3 .contact-info-block .inner-box {
    display: show !important;
}

.elementor-574 .elementor-element.elementor-element-6c8c08e .contact-info-section3 .contact-info-block h5 {
    display: show !important;
}

.elementor-574 .elementor-element.elementor-element-6c8c08e .contact-info-section3 .contact-info-block .icon-box {
    display: show !important;
    text-align: center !important;
}

.elementor-574 .elementor-element.elementor-element-6c8c08e .contact-info-section3 .contact-info-block h4 {
    display: show !important;
    text-align: center !important;
}

.elementor-574 .elementor-element.elementor-element-6c8c08e .contact-info-section3 .contact-info-block .text {
    display: show !important;
    text-align: center !important;
}

.elementor-574 .elementor-element.elementor-element-6c8c08e .contact-info-section3 .contact-info-block ul li {
    display: show !important;
    text-align: center !important;
}


.elementor-574 .elementor-element.elementor-element-14fb5e83:not(.elementor-motion-effects-element-type-background), .elementor-574 .elementor-element.elementor-element-14fb5e83 > .elementor-motion-effects-container > .elementor-motion-effects-layer {
    background-image: url("http://alcleanscarpet.site/bokeonelectric/wp-content/uploads/2020/10/mainslide-03-1.jpg");
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
}

.elementor-574 .elementor-element.elementor-element-14fb5e83 {
    transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
    margin-top: 0px;
    margin-bottom: 0px;
    padding: 0px 0px 0px 0px;
}

.elementor-574 .elementor-element.elementor-element-14fb5e83 > .elementor-background-overlay {
    transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
}

.elementor-574 .elementor-element.elementor-element-715de87d .two.contact-section.contact-page .sec-title h2 {
    display: show !important;
    text-align: center !important;
}

.elementor-574 .elementor-element.elementor-element-715de87d .contact-section .form-box .form-group input, .contact-section .form-box .form-group textarea {
    display: show !important;
}


.elementor-574 .elementor-element.elementor-element-715de87d .contact-section .form-box .form-group {
    text-align: center !important;
}

.elementor-574 .elementor-element.elementor-element-715de87d .contact-section .info-box .subtitle {
    display: show !important;
    text-align: center !important;
}

.elementor-574 .elementor-element.elementor-element-715de87d .contact-section .info-box .phone {
    display: show !important;
    text-align: center !important;
}
/*! elementor - v3.11.5 - 14-03-2023 */
.dialog-widget-content {
    background-color: #fff;
    position: absolute;
    border-radius: 3px;
    box-shadow: 2px 8px 23px 3px rgba(0,0,0,.2);
    overflow: hidden
}

.dialog-message {
    font-size: 12px;
    line-height: 1.5;
    box-sizing: border-box
}

.dialog-type-lightbox {
    position: fixed;
    height: 100%;
    width: 100%;
    bottom: 0;
    left: 0;
    background-color: rgba(0,0,0,.8);
    z-index: 9999;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none
}

.dialog-type-lightbox .dialog-widget-content {
    margin: auto;
    width: 400px
}

.dialog-type-lightbox .dialog-header {
    font-size: 15px;
    color: #495157;
    padding: 30px 0 10px;
    font-weight: 500
}

.dialog-type-lightbox .dialog-message {
    padding: 0 30px 30px;
    min-height: 50px
}

.dialog-type-lightbox:not(.elementor-popup-modal) .dialog-header,.dialog-type-lightbox:not(.elementor-popup-modal) .dialog-message {
    text-align: center
}

.dialog-type-lightbox .dialog-buttons-wrapper {
    border-top: 1px solid #e6e9ec;
    text-align: center
}

.dialog-type-lightbox .dialog-buttons-wrapper>.dialog-button {
    font-family: Roboto,Arial,Helvetica,Verdana,sans-serif;
    width: 50%;
    border: none;
    background: none;
    color: #6d7882;
    font-size: 15px;
    cursor: pointer;
    padding: 13px 0;
    outline: 0
}

.dialog-type-lightbox .dialog-buttons-wrapper>.dialog-button:hover {
    background-color: #f4f6f7
}

.dialog-type-lightbox .dialog-buttons-wrapper>.dialog-button.dialog-ok {
    color: #b01b1b
}

.dialog-type-lightbox .dialog-buttons-wrapper>.dialog-button.dialog-take_over {
    color: #39b54a
}

.dialog-type-lightbox .dialog-buttons-wrapper>.dialog-button:active {
    background-color: rgba(230,233,236,.5)
}

.dialog-type-lightbox .dialog-buttons-wrapper>.dialog-button::-moz-focus-inner {
    border: 0
}

.dialog-close-button {
    cursor: pointer;
    position: absolute;
    margin-top: 15px;
    right: 15px;
    font-size: 15px;
    line-height: 1;
    color: #a4afb7;
    transition: all .3s
}

.dialog-close-button:hover {
    color: #6d7882
}

.dialog-alert-widget .dialog-buttons-wrapper>button {
    width: 100%
}

.dialog-confirm-widget .dialog-button:first-child {
    border-right: 1px solid #e6e9ec
}

#elementor-change-exit-preference-dialog .dialog-message a {
    cursor: pointer
}

#elementor-change-exit-preference-dialog .dialog-message>div {
    margin-bottom: 10px
}

#elementor-change-exit-preference-dialog .dialog-ok {
    color: #39b54a
}

#e-experiments-dependency-dialog .dialog-confirm-header {
    font-weight: 600
}

#e-experiments-dependency-dialog .dialog-ok,#e-kit-elements-defaults-create-dialog .dialog-ok {
    color: #39b54a
}

#e-kit-elements-defaults-create-dialog label {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    margin-top: 20px
}

.dialog-prevent-scroll {
    overflow: hidden;
    max-height: 100vh
}

@media (min-width: 1024px) {
    body.admin-bar .dialog-lightbox-widget {
        height:calc(100vh - 32px)
    }
}

@media (max-width: 1024px) {
    body.admin-bar .dialog-type-lightbox {
        position:sticky;
        height: 100vh
    }
}

.flatpickr-calendar {
    width: 280px
}

.flatpickr-calendar .flatpickr-current-month span.cur-month {
    font-weight: 300
}

.flatpickr-calendar .dayContainer {
    width: 280px;
    min-width: 280px;
    max-width: 280px
}

.flatpickr-calendar .flatpickr-days {
    width: 280px
}

.flatpickr-calendar .flatpickr-day {
    max-width: 37px;
    height: 37px;
    line-height: 37px
}

.elementor-templates-modal .dialog-widget-content {
    font-family: Roboto,Arial,Helvetica,Verdana,sans-serif;
    background-color: #f1f3f5;
    width: 100%
}

@media (max-width: 1439px) {
    .elementor-templates-modal .dialog-widget-content {
        max-width:990px
    }
}

@media (min-width: 1440px) {
    .elementor-templates-modal .dialog-widget-content {
        max-width:1200px
    }
}

.elementor-templates-modal .dialog-header {
    padding: 0;
    background-color: #fff;
    box-shadow: 0 0 8px rgba(0,0,0,.1);
    position: relative;
    z-index: 1
}

.elementor-templates-modal .dialog-buttons-wrapper {
    background-color: #fff;
    border: none;
    display: none;
    justify-content: flex-end;
    padding: 5px;
    box-shadow: 0 0 8px rgba(0,0,0,.1);
    position: relative
}

.elementor-templates-modal .dialog-buttons-wrapper .elementor-button {
    height: 40px;
    margin-left: 5px
}

.elementor-templates-modal .dialog-buttons-wrapper .elementor-button-success {
    padding: 12px 36px;
    color: #fff;
    width: auto;
    font-size: 15px
}

.elementor-templates-modal .dialog-buttons-wrapper .elementor-button-success:hover {
    background-color: #39b54a
}

.elementor-templates-modal .dialog-message {
    height: 750px;
    max-height: 85vh;
    overflow-y: scroll;
    padding-top: 25px
}

.elementor-templates-modal .dialog-content {
    height: 100%
}

.elementor-templates-modal .dialog-loading {
    display: none
}

.elementor-templates-modal__header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 50px
}

.elementor-templates-modal__header__logo {
    line-height: 1;
    text-transform: uppercase;
    font-weight: 700;
    cursor: pointer
}

.elementor-templates-modal__header__logo-area {
    text-align: left;
    padding-left: 15px
}

.elementor-templates-modal__header__logo-area>* {
    display: flex;
    align-items: center
}

.elementor-templates-modal__header__logo__icon-wrapper {
    margin-right: 10px;
    font-size: 12px
}

.elementor-templates-modal__header__logo__title {
    padding-top: 2px
}

.elementor-templates-modal__header__items-area {
    display: flex;
    flex-direction: row-reverse
}

.elementor-templates-modal__header__item {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    box-sizing: content-box
}

.elementor-templates-modal__header__item>i {
    font-size: 20px;
    transition: all .3s;
    cursor: pointer
}

.elementor-templates-modal__header__item>i:not(:hover) {
    color: #a4afb7
}

.elementor-templates-modal__header__close--normal {
    width: 47px;
    border-left: 1px solid #e6e9ec
}

.elementor-templates-modal__header__close--normal i {
    font-size: 18px
}

.elementor-templates-modal__header__close--skip {
    padding: 10px 10px 10px 20px;
    margin-right: 10px;
    color: #fff;
    background-color: #a4afb7;
    font-size: 11px;
    font-weight: 400;
    line-height: 1;
    text-transform: uppercase;
    border-radius: 2px;
    cursor: pointer
}

.elementor-templates-modal__header__close--skip>i {
    font-size: inherit;
    padding-left: 10px;
    margin-left: 15px;
    border-left: 1px solid
}

.elementor-templates-modal__header__close--skip>i:not(:hover) {
    color: #fff
}

.elementor-templates-modal__sidebar {
    flex-shrink: 0;
    width: 25%;
    background-color: hsla(0,0%,100%,.3)
}

.elementor-templates-modal__content {
    flex-grow: 1;
    box-shadow: inset 0 0 13px rgba(0,0,0,.05)
}

#elementor-toast {
    position: absolute;
    width: 280px;
    padding: 20px;
    border-radius: 5px;
    color: #d5dadf;
    background-color: rgba(0,0,0,.8);
    z-index: 10000
}

#elementor-toast.dialog-position-window {
    position: fixed
}

#elementor-toast .dialog-message {
    font-size: 13px
}

#elementor-toast .dialog-buttons-wrapper {
    display: flex;
    justify-content: flex-end
}

#elementor-toast .dialog-buttons-wrapper:not(:empty) {
    margin-top: 15px
}

#elementor-toast .dialog-button {
    color: #fcb92c;
    margin: 0 5px;
    text-transform: uppercase;
    cursor: pointer
}

#elementor-toast .dialog-button:last-child {
    margin-right: 0
}

#wpadminbar #wp-admin-bar-elementor_edit_page .elementor-general-section+.elementor-second-section {
    border-top: 1px solid #464b50;
    margin-top: 6px
}

.elementor-hidden {
    display: none
}

.elementor-screen-only,.screen-reader-text,.screen-reader-text span,.ui-helper-hidden-accessible {
    position: absolute;
    top: -10000em;
    width: 1px;
    height: 1px;
    margin: -1px;
    padding: 0;
    overflow: hidden;
    clip: rect(0,0,0,0);
    border: 0
}

.elementor-clearfix:after {
    content: "";
    display: block;
    clear: both;
    width: 0;
    height: 0
}

.e-logo-wrapper {
    background: #93003c;
    display: inline-block;
    padding: .75em;
    border-radius: 50%;
    line-height: 1
}

.e-logo-wrapper i {
    color: #fff;
    font-size: 1em
}

#e-enable-unfiltered-files-dialog-import-template .dialog-confirm-ok {
    color: #39b54a
}

#e-enable-unfiltered-files-dialog-import-template .dialog-confirm-cancel {
    color: #b01b1b
}

.elementor-aspect-ratio-219 .elementor-fit-aspect-ratio {
    padding-bottom: 42.8571%
}

.elementor-aspect-ratio-169 .elementor-fit-aspect-ratio {
    padding-bottom: 56.25%
}

.elementor-aspect-ratio-43 .elementor-fit-aspect-ratio {
    padding-bottom: 75%
}

.elementor-aspect-ratio-32 .elementor-fit-aspect-ratio {
    padding-bottom: 66.6666%
}

.elementor-aspect-ratio-11 .elementor-fit-aspect-ratio {
    padding-bottom: 100%
}

.elementor-aspect-ratio-916 .elementor-fit-aspect-ratio {
    padding-bottom: 177.8%
}

.elementor-fit-aspect-ratio {
    position: relative;
    height: 0
}

.elementor-fit-aspect-ratio iframe {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    border: 0;
    background-color: #000
}

.elementor-fit-aspect-ratio video {
    width: 100%
}

.elementor *,.elementor :after,.elementor :before {
    box-sizing: border-box
}

.elementor a {
    box-shadow: none;
    text-decoration: none
}

.elementor hr {
    margin: 0;
    background-color: transparent
}

.elementor img {
    height: auto;
    max-width: 100%;
    border: none;
    border-radius: 0;
    box-shadow: none
}

.elementor .elementor-widget:not(.elementor-widget-text-editor):not(.elementor-widget-theme-post-content) figure {
    margin: 0
}

.elementor embed,.elementor iframe,.elementor object,.elementor video {
    max-width: 100%;
    width: 100%;
    margin: 0;
    line-height: 1;
    border: none
}

.elementor .elementor-background,.elementor .elementor-background-holder,.elementor .elementor-background-video-container {
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    position: absolute;
    overflow: hidden;
    z-index: 0;
    direction: ltr
}

.elementor .elementor-background-video-container {
    transition: opacity 1s;
    pointer-events: none
}

.elementor .elementor-background-video-container.elementor-loading {
    opacity: 0
}

.elementor .elementor-background-video-embed {
    max-width: none
}

.elementor .elementor-background-video,.elementor .elementor-background-video-embed,.elementor .elementor-background-video-hosted {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%)
}

.elementor .elementor-background-video {
    max-width: none
}

.elementor .elementor-html5-video {
    -o-object-fit: cover;
    object-fit: cover
}

.elementor .elementor-background-overlay,.elementor .elementor-background-slideshow {
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    position: absolute
}

.elementor .elementor-background-slideshow {
    z-index: 0
}

.elementor .elementor-background-slideshow__slide__image {
    width: 100%;
    height: 100%;
    background-position: 50%;
    background-size: cover
}

.e-con-inner>.elementor-element.elementor-absolute,.e-con>.elementor-element.elementor-absolute,.elementor-widget-wrap>.elementor-element.elementor-absolute {
    position: absolute
}

.e-con-inner>.elementor-element.elementor-fixed,.e-con>.elementor-element.elementor-fixed,.elementor-widget-wrap>.elementor-element.elementor-fixed {
    position: fixed
}

.elementor-widget-wrap .elementor-element.elementor-widget__width-auto,.elementor-widget-wrap .elementor-element.elementor-widget__width-initial {
    max-width: 100%
}

@media (max-width: 1024px) {
    .elementor-widget-wrap .elementor-element.elementor-widget-tablet__width-auto,.elementor-widget-wrap .elementor-element.elementor-widget-tablet__width-initial {
        max-width:100%
    }
}

@media (max-width: 767px) {
    .elementor-widget-wrap .elementor-element.elementor-widget-mobile__width-auto,.elementor-widget-wrap .elementor-element.elementor-widget-mobile__width-initial {
        max-width:100%
    }
}

.elementor-element {
    --flex-direction: initial;
    --flex-wrap: initial;
    --justify-content: initial;
    --align-items: initial;
    --align-content: initial;
    --gap: initial;
    --flex-basis: initial;
    --flex-grow: initial;
    --flex-shrink: initial;
    --order: initial;
    --align-self: initial;
    flex-basis: var(--flex-basis);
    flex-grow: var(--flex-grow);
    flex-shrink: var(--flex-shrink);
    order: var(--order);
    align-self: var(--align-self)
}

.elementor-element.elementor-absolute,.elementor-element.elementor-fixed {
    z-index: 1
}

.elementor-element:where(.e-con-full,.elementor-widget) {
    flex-direction: var(--flex-direction);
    flex-wrap: var(--flex-wrap);
    justify-content: var(--justify-content);
    align-items: var(--align-items);
    align-content: var(--align-content);
    gap: var(--gap)
}

.elementor-invisible {
    visibility: hidden
}

.elementor-align-center {
    text-align: center
}

.elementor-align-center .elementor-button {
    width: auto
}

.elementor-align-right {
    text-align: right
}

.elementor-align-right .elementor-button {
    width: auto
}

.elementor-align-left {
    text-align: left
}

.elementor-align-left .elementor-button {
    width: auto
}

.elementor-align-justify .elementor-button {
    width: 100%
}

.elementor-custom-embed-play {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%)
}

.elementor-custom-embed-play i {
    font-size: 100px;
    color: #fff;
    text-shadow: 1px 0 6px rgba(0,0,0,.3)
}

.elementor-custom-embed-play svg {
    height: 100px;
    width: 100px;
    fill: #fff;
    filter: drop-shadow(1px 0 6px rgba(0,0,0,.3))
}

.elementor-custom-embed-play i,.elementor-custom-embed-play svg {
    opacity: .8;
    transition: all .5s
}

.elementor-custom-embed-play.elementor-playing i {
    font-family: eicons
}

.elementor-custom-embed-play.elementor-playing i:before {
    content: "\e8fb"
}

.elementor-custom-embed-play.elementor-playing i,.elementor-custom-embed-play.elementor-playing svg {
    animation: eicon-spin 2s linear infinite
}

.elementor-tag {
    display: inline-flex
}

.elementor-ken-burns {
    transition-property: transform;
    transition-duration: 10s;
    transition-timing-function: linear
}

.elementor-ken-burns--out {
    transform: scale(1.3)
}

.elementor-ken-burns--active {
    transition-duration: 20s
}

.elementor-ken-burns--active.elementor-ken-burns--out {
    transform: scale(1)
}

.elementor-ken-burns--active.elementor-ken-burns--in {
    transform: scale(1.3)
}

@media (min-width: -1) {
    .elementor-widescreen-align-center {
        text-align:center
    }

    .elementor-widescreen-align-center .elementor-button {
        width: auto
    }

    .elementor-widescreen-align-right {
        text-align: right
    }

    .elementor-widescreen-align-right .elementor-button {
        width: auto
    }

    .elementor-widescreen-align-left {
        text-align: left
    }

    .elementor-widescreen-align-left .elementor-button {
        width: auto
    }

    .elementor-widescreen-align-justify .elementor-button {
        width: 100%
    }
}

@media (max-width: -1) {
    .elementor-laptop-align-center {
        text-align:center
    }

    .elementor-laptop-align-center .elementor-button {
        width: auto
    }

    .elementor-laptop-align-right {
        text-align: right
    }

    .elementor-laptop-align-right .elementor-button {
        width: auto
    }

    .elementor-laptop-align-left {
        text-align: left
    }

    .elementor-laptop-align-left .elementor-button {
        width: auto
    }

    .elementor-laptop-align-justify .elementor-button {
        width: 100%
    }
}

@media (max-width: -1) {
    .elementor-tablet_extra-align-center {
        text-align:center
    }

    .elementor-tablet_extra-align-center .elementor-button {
        width: auto
    }

    .elementor-tablet_extra-align-right {
        text-align: right
    }

    .elementor-tablet_extra-align-right .elementor-button {
        width: auto
    }

    .elementor-tablet_extra-align-left {
        text-align: left
    }

    .elementor-tablet_extra-align-left .elementor-button {
        width: auto
    }

    .elementor-tablet_extra-align-justify .elementor-button {
        width: 100%
    }
}

@media (max-width: 1024px) {
    .elementor-tablet-align-center {
        text-align:center
    }

    .elementor-tablet-align-center .elementor-button {
        width: auto
    }

    .elementor-tablet-align-right {
        text-align: right
    }

    .elementor-tablet-align-right .elementor-button {
        width: auto
    }

    .elementor-tablet-align-left {
        text-align: left
    }

    .elementor-tablet-align-left .elementor-button {
        width: auto
    }

    .elementor-tablet-align-justify .elementor-button {
        width: 100%
    }
}

@media (max-width: -1) {
    .elementor-mobile_extra-align-center {
        text-align:center
    }

    .elementor-mobile_extra-align-center .elementor-button {
        width: auto
    }

    .elementor-mobile_extra-align-right {
        text-align: right
    }

    .elementor-mobile_extra-align-right .elementor-button {
        width: auto
    }

    .elementor-mobile_extra-align-left {
        text-align: left
    }

    .elementor-mobile_extra-align-left .elementor-button {
        width: auto
    }

    .elementor-mobile_extra-align-justify .elementor-button {
        width: 100%
    }
}

@media (max-width: 767px) {
    .elementor-mobile-align-center {
        text-align:center
    }

    .elementor-mobile-align-center .elementor-button {
        width: auto
    }

    .elementor-mobile-align-right {
        text-align: right
    }

    .elementor-mobile-align-right .elementor-button {
        width: auto
    }

    .elementor-mobile-align-left {
        text-align: left
    }

    .elementor-mobile-align-left .elementor-button {
        width: auto
    }

    .elementor-mobile-align-justify .elementor-button {
        width: 100%
    }
}

:root {
    --page-title-display: block
}

.elementor-page-title,h1.entry-title {
    display: var(--page-title-display)
}

@keyframes eicon-spin {
    0% {
        transform: rotate(0deg)
    }

    to {
        transform: rotate(359deg)
    }
}

.eicon-animation-spin {
    animation: eicon-spin 2s linear infinite
}

.elementor-section {
    position: relative
}

.elementor-section .elementor-container {
    display: flex;
    margin-right: auto;
    margin-left: auto;
    position: relative
}

@media (max-width: 1024px) {
    .elementor-section .elementor-container {
        flex-wrap:wrap
    }
}

.elementor-section.elementor-section-boxed>.elementor-container {
    max-width: 1140px
}

.elementor-section.elementor-section-stretched {
    position: relative;
    width: 100%
}

.elementor-section.elementor-section-items-top>.elementor-container {
    align-items: flex-start
}

.elementor-section.elementor-section-items-middle>.elementor-container {
    align-items: center
}

.elementor-section.elementor-section-items-bottom>.elementor-container {
    align-items: flex-end
}

@media (min-width: 768px) {
    .elementor-section.elementor-section-height-full {
        height:100vh
    }

    .elementor-section.elementor-section-height-full>.elementor-container {
        height: 100%
    }
}

.elementor-bc-flex-widget .elementor-section-content-top>.elementor-container>.elementor-column>.elementor-widget-wrap {
    align-items: flex-start
}

.elementor-bc-flex-widget .elementor-section-content-middle>.elementor-container>.elementor-column>.elementor-widget-wrap {
    align-items: center
}

.elementor-bc-flex-widget .elementor-section-content-bottom>.elementor-container>.elementor-column>.elementor-widget-wrap {
    align-items: flex-end
}

.elementor-row {
    width: 100%;
    display: flex
}

@media (max-width: 1024px) {
    .elementor-row {
        flex-wrap:wrap
    }
}

.elementor-widget-wrap {
    position: relative;
    width: 100%;
    flex-wrap: wrap;
    align-content: flex-start
}

.elementor:not(.elementor-bc-flex-widget) .elementor-widget-wrap {
    display: flex
}

.elementor-widget-wrap>.elementor-element {
    width: 100%
}

.elementor-widget-wrap.e-swiper-container {
    width: calc(100% - (var(--e-column-margin-left, 0px) + var(--e-column-margin-right, 0px)))
}

.elementor-widget {
    position: relative
}

.elementor-widget:not(:last-child) {
    margin-bottom: 20px
}

.elementor-widget:not(:last-child).elementor-absolute,.elementor-widget:not(:last-child).elementor-widget__width-auto,.elementor-widget:not(:last-child).elementor-widget__width-initial {
    margin-bottom: 0
}

.elementor-column {
    position: relative;
    min-height: 1px;
    display: flex
}

.elementor-574 .elementor-element.elementor-element-715de87d .contact-section .form-box .form-group input, .contact-section .form-box .form-group textarea {
    display: show !important;
}
.elementor-column-wrap {
    width: 100%;
    position: relative;
    display: flex
}

.elementor-column-gap-narrow>.elementor-column>.elementor-element-populated {
    padding: 5px
}

.elementor-column-gap-default>.elementor-column>.elementor-element-populated {
    padding: 10px
}

.elementor-column-gap-extended>.elementor-column>.elementor-element-populated {
    padding: 15px
}

.elementor-column-gap-wide>.elementor-column>.elementor-element-populated {
    padding: 20px
}

.elementor-column-gap-wider>.elementor-column>.elementor-element-populated {
    padding: 30px
}

.elementor-inner-section .elementor-column-gap-no .elementor-element-populated {
    padding: 0
}

@media (min-width: 768px) {
    .elementor-column.elementor-col-10,.elementor-column[data-col="10"] {
        width:10%
    }

    .elementor-column.elementor-col-11,.elementor-column[data-col="11"] {
        width: 11.111%
    }

    .elementor-column.elementor-col-12,.elementor-column[data-col="12"] {
        width: 12.5%
    }

    .elementor-column.elementor-col-14,.elementor-column[data-col="14"] {
        width: 14.285%
    }

    .elementor-column.elementor-col-16,.elementor-column[data-col="16"] {
        width: 16.666%
    }

    .elementor-column.elementor-col-20,.elementor-column[data-col="20"] {
        width: 20%
    }

    .elementor-column.elementor-col-25,.elementor-column[data-col="25"] {
        width: 25%
    }

    .elementor-column.elementor-col-30,.elementor-column[data-col="30"] {
        width: 30%
    }

    .elementor-column.elementor-col-33,.elementor-column[data-col="33"] {
        width: 33.333%
    }

    .elementor-column.elementor-col-40,.elementor-column[data-col="40"] {
        width: 40%
    }

    .elementor-column.elementor-col-50,.elementor-column[data-col="50"] {
        width: 50%
    }

    .elementor-column.elementor-col-60,.elementor-column[data-col="60"] {
        width: 60%
    }

    .elementor-column.elementor-col-66,.elementor-column[data-col="66"] {
        width: 66.666%
    }

    .elementor-column.elementor-col-70,.elementor-column[data-col="70"] {
        width: 70%
    }

    .elementor-column.elementor-col-75,.elementor-column[data-col="75"] {
        width: 75%
    }

    .elementor-column.elementor-col-80,.elementor-column[data-col="80"] {
        width: 80%
    }

    .elementor-column.elementor-col-83,.elementor-column[data-col="83"] {
        width: 83.333%
    }

    .elementor-column.elementor-col-90,.elementor-column[data-col="90"] {
        width: 90%
    }

    .elementor-column.elementor-col-100,.elementor-column[data-col="100"] {
        width: 100%
    }
}

@media (max-width: 479px) {
    .elementor-column.elementor-xs-10 {
        width:10%
    }

    .elementor-column.elementor-xs-11 {
        width: 11.111%
    }

    .elementor-column.elementor-xs-12 {
        width: 12.5%
    }

    .elementor-column.elementor-xs-14 {
        width: 14.285%
    }

    .elementor-column.elementor-xs-16 {
        width: 16.666%
    }

    .elementor-column.elementor-xs-20 {
        width: 20%
    }

    .elementor-column.elementor-xs-25 {
        width: 25%
    }

    .elementor-column.elementor-xs-30 {
        width: 30%
    }

    .elementor-column.elementor-xs-33 {
        width: 33.333%
    }

    .elementor-column.elementor-xs-40 {
        width: 40%
    }

    .elementor-column.elementor-xs-50 {
        width: 50%
    }

    .elementor-column.elementor-xs-60 {
        width: 60%
    }

    .elementor-column.elementor-xs-66 {
        width: 66.666%
    }

    .elementor-column.elementor-xs-70 {
        width: 70%
    }

    .elementor-column.elementor-xs-75 {
        width: 75%
    }

    .elementor-column.elementor-xs-80 {
        width: 80%
    }

    .elementor-column.elementor-xs-83 {
        width: 83.333%
    }

    .elementor-column.elementor-xs-90 {
        width: 90%
    }

    .elementor-column.elementor-xs-100 {
        width: 100%
    }
}

@media (max-width: 767px) {
    .elementor-column.elementor-sm-10 {
        width:10%
    }

    .elementor-column.elementor-sm-11 {
        width: 11.111%
    }

    .elementor-column.elementor-sm-12 {
        width: 12.5%
    }

    .elementor-column.elementor-sm-14 {
        width: 14.285%
    }

    .elementor-column.elementor-sm-16 {
        width: 16.666%
    }

    .elementor-column.elementor-sm-20 {
        width: 20%
    }

    .elementor-column.elementor-sm-25 {
        width: 25%
    }

    .elementor-column.elementor-sm-30 {
        width: 30%
    }

    .elementor-column.elementor-sm-33 {
        width: 33.333%
    }

    .elementor-column.elementor-sm-40 {
        width: 40%
    }

    .elementor-column.elementor-sm-50 {
        width: 50%
    }

    .elementor-column.elementor-sm-60 {
        width: 60%
    }

    .elementor-column.elementor-sm-66 {
        width: 66.666%
    }

    .elementor-column.elementor-sm-70 {
        width: 70%
    }

    .elementor-column.elementor-sm-75 {
        width: 75%
    }

    .elementor-column.elementor-sm-80 {
        width: 80%
    }

    .elementor-column.elementor-sm-83 {
        width: 83.333%
    }

    .elementor-column.elementor-sm-90 {
        width: 90%
    }

    .elementor-column.elementor-sm-100 {
        width: 100%
    }
}

@media (min-width: 768px) and (max-width:1024px) {
    .elementor-column.elementor-md-10 {
        width:10%
    }

    .elementor-column.elementor-md-11 {
        width: 11.111%
    }

    .elementor-column.elementor-md-12 {
        width: 12.5%
    }

    .elementor-column.elementor-md-14 {
        width: 14.285%
    }

    .elementor-column.elementor-md-16 {
        width: 16.666%
    }

    .elementor-column.elementor-md-20 {
        width: 20%
    }

    .elementor-column.elementor-md-25 {
        width: 25%
    }

    .elementor-column.elementor-md-30 {
        width: 30%
    }

    .elementor-column.elementor-md-33 {
        width: 33.333%
    }

    .elementor-column.elementor-md-40 {
        width: 40%
    }

    .elementor-column.elementor-md-50 {
        width: 50%
    }

    .elementor-column.elementor-md-60 {
        width: 60%
    }

    .elementor-column.elementor-md-66 {
        width: 66.666%
    }

    .elementor-column.elementor-md-70 {
        width: 70%
    }

    .elementor-column.elementor-md-75 {
        width: 75%
    }

    .elementor-column.elementor-md-80 {
        width: 80%
    }

    .elementor-column.elementor-md-83 {
        width: 83.333%
    }

    .elementor-column.elementor-md-90 {
        width: 90%
    }

    .elementor-column.elementor-md-100 {
        width: 100%
    }
}

@media (min-width: -1) {
    .elementor-reverse-widescreen>.elementor-container>:first-child {
        order:10
    }

    .elementor-reverse-widescreen>.elementor-container>:nth-child(2) {
        order: 9
    }

    .elementor-reverse-widescreen>.elementor-container>:nth-child(3) {
        order: 8
    }

    .elementor-reverse-widescreen>.elementor-container>:nth-child(4) {
        order: 7
    }

    .elementor-reverse-widescreen>.elementor-container>:nth-child(5) {
        order: 6
    }

    .elementor-reverse-widescreen>.elementor-container>:nth-child(6) {
        order: 5
    }

    .elementor-reverse-widescreen>.elementor-container>:nth-child(7) {
        order: 4
    }

    .elementor-reverse-widescreen>.elementor-container>:nth-child(8) {
        order: 3
    }

    .elementor-reverse-widescreen>.elementor-container>:nth-child(9) {
        order: 2
    }

    .elementor-reverse-widescreen>.elementor-container>:nth-child(10) {
        order: 1
    }
}

@media (min-width: 1025px) and (max-width:-1) {
    .elementor-reverse-laptop>.elementor-container>:first-child {
        order:10
    }

    .elementor-reverse-laptop>.elementor-container>:nth-child(2) {
        order: 9
    }

    .elementor-reverse-laptop>.elementor-container>:nth-child(3) {
        order: 8
    }

    .elementor-reverse-laptop>.elementor-container>:nth-child(4) {
        order: 7
    }

    .elementor-reverse-laptop>.elementor-container>:nth-child(5) {
        order: 6
    }

    .elementor-reverse-laptop>.elementor-container>:nth-child(6) {
        order: 5
    }

    .elementor-reverse-laptop>.elementor-container>:nth-child(7) {
        order: 4
    }

    .elementor-reverse-laptop>.elementor-container>:nth-child(8) {
        order: 3
    }

    .elementor-reverse-laptop>.elementor-container>:nth-child(9) {
        order: 2
    }

    .elementor-reverse-laptop>.elementor-container>:nth-child(10) {
        order: 1
    }
}

@media (min-width: -1) and (max-width:-1) {
    .elementor-reverse-laptop>.elementor-container>:first-child {
        order:10
    }

    .elementor-reverse-laptop>.elementor-container>:nth-child(2) {
        order: 9
    }

    .elementor-reverse-laptop>.elementor-container>:nth-child(3) {
        order: 8
    }

    .elementor-reverse-laptop>.elementor-container>:nth-child(4) {
        order: 7
    }

    .elementor-reverse-laptop>.elementor-container>:nth-child(5) {
        order: 6
    }

    .elementor-reverse-laptop>.elementor-container>:nth-child(6) {
        order: 5
    }

    .elementor-reverse-laptop>.elementor-container>:nth-child(7) {
        order: 4
    }

    .elementor-reverse-laptop>.elementor-container>:nth-child(8) {
        order: 3
    }

    .elementor-reverse-laptop>.elementor-container>:nth-child(9) {
        order: 2
    }

    .elementor-reverse-laptop>.elementor-container>:nth-child(10) {
        order: 1
    }
}

@media (min-width: 1025px) and (max-width:-1) {
    .elementor-reverse-laptop>.elementor-container>:first-child,.elementor-reverse-laptop>.elementor-container>:nth-child(2),.elementor-reverse-laptop>.elementor-container>:nth-child(3),.elementor-reverse-laptop>.elementor-container>:nth-child(4),.elementor-reverse-laptop>.elementor-container>:nth-child(5),.elementor-reverse-laptop>.elementor-container>:nth-child(6),.elementor-reverse-laptop>.elementor-container>:nth-child(7),.elementor-reverse-laptop>.elementor-container>:nth-child(8),.elementor-reverse-laptop>.elementor-container>:nth-child(9),.elementor-reverse-laptop>.elementor-container>:nth-child(10) {
        order:0
    }

    .elementor-reverse-tablet_extra>.elementor-container>:first-child {
        order: 10
    }

    .elementor-reverse-tablet_extra>.elementor-container>:nth-child(2) {
        order: 9
    }

    .elementor-reverse-tablet_extra>.elementor-container>:nth-child(3) {
        order: 8
    }

    .elementor-reverse-tablet_extra>.elementor-container>:nth-child(4) {
        order: 7
    }

    .elementor-reverse-tablet_extra>.elementor-container>:nth-child(5) {
        order: 6
    }

    .elementor-reverse-tablet_extra>.elementor-container>:nth-child(6) {
        order: 5
    }

    .elementor-reverse-tablet_extra>.elementor-container>:nth-child(7) {
        order: 4
    }

    .elementor-reverse-tablet_extra>.elementor-container>:nth-child(8) {
        order: 3
    }

    .elementor-reverse-tablet_extra>.elementor-container>:nth-child(9) {
        order: 2
    }

    .elementor-reverse-tablet_extra>.elementor-container>:nth-child(10) {
        order: 1
    }
}

@media (min-width: 768px) and (max-width:1024px) {
    .elementor-reverse-tablet>.elementor-container>:first-child {
        order:10
    }

    .elementor-reverse-tablet>.elementor-container>:nth-child(2) {
        order: 9
    }

    .elementor-reverse-tablet>.elementor-container>:nth-child(3) {
        order: 8
    }

    .elementor-reverse-tablet>.elementor-container>:nth-child(4) {
        order: 7
    }

    .elementor-reverse-tablet>.elementor-container>:nth-child(5) {
        order: 6
    }

    .elementor-reverse-tablet>.elementor-container>:nth-child(6) {
        order: 5
    }

    .elementor-reverse-tablet>.elementor-container>:nth-child(7) {
        order: 4
    }

    .elementor-reverse-tablet>.elementor-container>:nth-child(8) {
        order: 3
    }

    .elementor-reverse-tablet>.elementor-container>:nth-child(9) {
        order: 2
    }

    .elementor-reverse-tablet>.elementor-container>:nth-child(10) {
        order: 1
    }
}

@media (min-width: -1) and (max-width:1024px) {
    .elementor-reverse-tablet>.elementor-container>:first-child {
        order:10
    }

    .elementor-reverse-tablet>.elementor-container>:nth-child(2) {
        order: 9
    }

    .elementor-reverse-tablet>.elementor-container>:nth-child(3) {
        order: 8
    }

    .elementor-reverse-tablet>.elementor-container>:nth-child(4) {
        order: 7
    }

    .elementor-reverse-tablet>.elementor-container>:nth-child(5) {
        order: 6
    }

    .elementor-reverse-tablet>.elementor-container>:nth-child(6) {
        order: 5
    }

    .elementor-reverse-tablet>.elementor-container>:nth-child(7) {
        order: 4
    }

    .elementor-reverse-tablet>.elementor-container>:nth-child(8) {
        order: 3
    }

    .elementor-reverse-tablet>.elementor-container>:nth-child(9) {
        order: 2
    }

    .elementor-reverse-tablet>.elementor-container>:nth-child(10) {
        order: 1
    }
}

@media (min-width: 768px) and (max-width:-1) {
    .elementor-reverse-tablet>.elementor-container>:first-child,.elementor-reverse-tablet>.elementor-container>:nth-child(2),.elementor-reverse-tablet>.elementor-container>:nth-child(3),.elementor-reverse-tablet>.elementor-container>:nth-child(4),.elementor-reverse-tablet>.elementor-container>:nth-child(5),.elementor-reverse-tablet>.elementor-container>:nth-child(6),.elementor-reverse-tablet>.elementor-container>:nth-child(7),.elementor-reverse-tablet>.elementor-container>:nth-child(8),.elementor-reverse-tablet>.elementor-container>:nth-child(9),.elementor-reverse-tablet>.elementor-container>:nth-child(10) {
        order:0
    }

    .elementor-reverse-mobile_extra>.elementor-container>:first-child {
        order: 10
    }

    .elementor-reverse-mobile_extra>.elementor-container>:nth-child(2) {
        order: 9
    }

    .elementor-reverse-mobile_extra>.elementor-container>:nth-child(3) {
        order: 8
    }

    .elementor-reverse-mobile_extra>.elementor-container>:nth-child(4) {
        order: 7
    }

    .elementor-reverse-mobile_extra>.elementor-container>:nth-child(5) {
        order: 6
    }

    .elementor-reverse-mobile_extra>.elementor-container>:nth-child(6) {
        order: 5
    }

    .elementor-reverse-mobile_extra>.elementor-container>:nth-child(7) {
        order: 4
    }

    .elementor-reverse-mobile_extra>.elementor-container>:nth-child(8) {
        order: 3
    }

    .elementor-reverse-mobile_extra>.elementor-container>:nth-child(9) {
        order: 2
    }

    .elementor-reverse-mobile_extra>.elementor-container>:nth-child(10) {
        order: 1
    }
}

@media (max-width: 767px) {
    .elementor-reverse-mobile>.elementor-container>:first-child {
        order:10
    }

    .elementor-reverse-mobile>.elementor-container>:nth-child(2) {
        order: 9
    }

    .elementor-reverse-mobile>.elementor-container>:nth-child(3) {
        order: 8
    }

    .elementor-reverse-mobile>.elementor-container>:nth-child(4) {
        order: 7
    }

    .elementor-reverse-mobile>.elementor-container>:nth-child(5) {
        order: 6
    }

    .elementor-reverse-mobile>.elementor-container>:nth-child(6) {
        order: 5
    }

    .elementor-reverse-mobile>.elementor-container>:nth-child(7) {
        order: 4
    }

    .elementor-reverse-mobile>.elementor-container>:nth-child(8) {
        order: 3
    }

    .elementor-reverse-mobile>.elementor-container>:nth-child(9) {
        order: 2
    }

    .elementor-reverse-mobile>.elementor-container>:nth-child(10) {
        order: 1
    }

    .elementor-column {
        width: 100%
    }
}

ul.elementor-icon-list-items.elementor-inline-items {
    display: flex;
    flex-wrap: wrap
}

ul.elementor-icon-list-items.elementor-inline-items .elementor-inline-item {
    word-break: break-word
}

.elementor-grid {
    display: grid;
    grid-column-gap: var(--grid-column-gap);
    grid-row-gap: var(--grid-row-gap)
}

.elementor-grid .elementor-grid-item {
    min-width: 0
}

.elementor-grid-0 .elementor-grid {
    display: inline-block;
    width: 100%;
    word-spacing: var(--grid-column-gap);
    margin-bottom: calc(-1 * var(--grid-row-gap))
}

.elementor-grid-0 .elementor-grid .elementor-grid-item {
    display: inline-block;
    margin-bottom: var(--grid-row-gap);
    word-break: break-word
}

.elementor-grid-1 .elementor-grid {
    grid-template-columns: repeat(1,1fr)
}

.elementor-grid-2 .elementor-grid {
    grid-template-columns: repeat(2,1fr)
}

.elementor-grid-3 .elementor-grid {
    grid-template-columns: repeat(3,1fr)
}

.elementor-grid-4 .elementor-grid {
    grid-template-columns: repeat(4,1fr)
}

.elementor-grid-5 .elementor-grid {
    grid-template-columns: repeat(5,1fr)
}

.elementor-grid-6 .elementor-grid {
    grid-template-columns: repeat(6,1fr)
}

.elementor-grid-7 .elementor-grid {
    grid-template-columns: repeat(7,1fr)
}

.elementor-grid-8 .elementor-grid {
    grid-template-columns: repeat(8,1fr)
}

.elementor-grid-9 .elementor-grid {
    grid-template-columns: repeat(9,1fr)
}

.elementor-grid-10 .elementor-grid {
    grid-template-columns: repeat(10,1fr)
}

.elementor-grid-11 .elementor-grid {
    grid-template-columns: repeat(11,1fr)
}

.elementor-grid-12 .elementor-grid {
    grid-template-columns: repeat(12,1fr)
}

@media (min-width: -1) {
    .elementor-grid-widescreen-0 .elementor-grid {
        display:inline-block;
        width: 100%;
        word-spacing: var(--grid-column-gap);
        margin-bottom: calc(-1 * var(--grid-row-gap))
    }

    .elementor-grid-widescreen-0 .elementor-grid .elementor-grid-item {
        display: inline-block;
        margin-bottom: var(--grid-row-gap);
        word-break: break-word
    }

    .elementor-grid-widescreen-1 .elementor-grid {
        grid-template-columns: repeat(1,1fr)
    }

    .elementor-grid-widescreen-2 .elementor-grid {
        grid-template-columns: repeat(2,1fr)
    }

    .elementor-grid-widescreen-3 .elementor-grid {
        grid-template-columns: repeat(3,1fr)
    }

    .elementor-grid-widescreen-4 .elementor-grid {
        grid-template-columns: repeat(4,1fr)
    }

    .elementor-grid-widescreen-5 .elementor-grid {
        grid-template-columns: repeat(5,1fr)
    }

    .elementor-grid-widescreen-6 .elementor-grid {
        grid-template-columns: repeat(6,1fr)
    }

    .elementor-grid-widescreen-7 .elementor-grid {
        grid-template-columns: repeat(7,1fr)
    }

    .elementor-grid-widescreen-8 .elementor-grid {
        grid-template-columns: repeat(8,1fr)
    }

    .elementor-grid-widescreen-9 .elementor-grid {
        grid-template-columns: repeat(9,1fr)
    }

    .elementor-grid-widescreen-10 .elementor-grid {
        grid-template-columns: repeat(10,1fr)
    }

    .elementor-grid-widescreen-11 .elementor-grid {
        grid-template-columns: repeat(11,1fr)
    }

    .elementor-grid-widescreen-12 .elementor-grid {
        grid-template-columns: repeat(12,1fr)
    }
}

@media (max-width: -1) {
    .elementor-grid-laptop-0 .elementor-grid {
        display:inline-block;
        width: 100%;
        word-spacing: var(--grid-column-gap);
        margin-bottom: calc(-1 * var(--grid-row-gap))
    }

    .elementor-grid-laptop-0 .elementor-grid .elementor-grid-item {
        display: inline-block;
        margin-bottom: var(--grid-row-gap);
        word-break: break-word
    }

    .elementor-grid-laptop-1 .elementor-grid {
        grid-template-columns: repeat(1,1fr)
    }

    .elementor-grid-laptop-2 .elementor-grid {
        grid-template-columns: repeat(2,1fr)
    }

    .elementor-grid-laptop-3 .elementor-grid {
        grid-template-columns: repeat(3,1fr)
    }

    .elementor-grid-laptop-4 .elementor-grid {
        grid-template-columns: repeat(4,1fr)
    }

    .elementor-grid-laptop-5 .elementor-grid {
        grid-template-columns: repeat(5,1fr)
    }

    .elementor-grid-laptop-6 .elementor-grid {
        grid-template-columns: repeat(6,1fr)
    }

    .elementor-grid-laptop-7 .elementor-grid {
        grid-template-columns: repeat(7,1fr)
    }

    .elementor-grid-laptop-8 .elementor-grid {
        grid-template-columns: repeat(8,1fr)
    }

    .elementor-grid-laptop-9 .elementor-grid {
        grid-template-columns: repeat(9,1fr)
    }

    .elementor-grid-laptop-10 .elementor-grid {
        grid-template-columns: repeat(10,1fr)
    }

    .elementor-grid-laptop-11 .elementor-grid {
        grid-template-columns: repeat(11,1fr)
    }

    .elementor-grid-laptop-12 .elementor-grid {
        grid-template-columns: repeat(12,1fr)
    }
}

@media (max-width: -1) {
    .elementor-grid-tablet_extra-0 .elementor-grid {
        display:inline-block;
        width: 100%;
        word-spacing: var(--grid-column-gap);
        margin-bottom: calc(-1 * var(--grid-row-gap))
    }

    .elementor-grid-tablet_extra-0 .elementor-grid .elementor-grid-item {
        display: inline-block;
        margin-bottom: var(--grid-row-gap);
        word-break: break-word
    }

    .elementor-grid-tablet_extra-1 .elementor-grid {
        grid-template-columns: repeat(1,1fr)
    }

    .elementor-grid-tablet_extra-2 .elementor-grid {
        grid-template-columns: repeat(2,1fr)
    }

    .elementor-grid-tablet_extra-3 .elementor-grid {
        grid-template-columns: repeat(3,1fr)
    }

    .elementor-grid-tablet_extra-4 .elementor-grid {
        grid-template-columns: repeat(4,1fr)
    }

    .elementor-grid-tablet_extra-5 .elementor-grid {
        grid-template-columns: repeat(5,1fr)
    }

    .elementor-grid-tablet_extra-6 .elementor-grid {
        grid-template-columns: repeat(6,1fr)
    }

    .elementor-grid-tablet_extra-7 .elementor-grid {
        grid-template-columns: repeat(7,1fr)
    }

    .elementor-grid-tablet_extra-8 .elementor-grid {
        grid-template-columns: repeat(8,1fr)
    }

    .elementor-grid-tablet_extra-9 .elementor-grid {
        grid-template-columns: repeat(9,1fr)
    }

    .elementor-grid-tablet_extra-10 .elementor-grid {
        grid-template-columns: repeat(10,1fr)
    }

    .elementor-grid-tablet_extra-11 .elementor-grid {
        grid-template-columns: repeat(11,1fr)
    }

    .elementor-grid-tablet_extra-12 .elementor-grid {
        grid-template-columns: repeat(12,1fr)
    }
}

@media (max-width: 1024px) {
    .elementor-grid-tablet-0 .elementor-grid {
        display:inline-block;
        width: 100%;
        word-spacing: var(--grid-column-gap);
        margin-bottom: calc(-1 * var(--grid-row-gap))
    }

    .elementor-grid-tablet-0 .elementor-grid .elementor-grid-item {
        display: inline-block;
        margin-bottom: var(--grid-row-gap);
        word-break: break-word
    }

    .elementor-grid-tablet-1 .elementor-grid {
        grid-template-columns: repeat(1,1fr)
    }

    .elementor-grid-tablet-2 .elementor-grid {
        grid-template-columns: repeat(2,1fr)
    }

    .elementor-grid-tablet-3 .elementor-grid {
        grid-template-columns: repeat(3,1fr)
    }

    .elementor-grid-tablet-4 .elementor-grid {
        grid-template-columns: repeat(4,1fr)
    }

    .elementor-grid-tablet-5 .elementor-grid {
        grid-template-columns: repeat(5,1fr)
    }

    .elementor-grid-tablet-6 .elementor-grid {
        grid-template-columns: repeat(6,1fr)
    }

    .elementor-grid-tablet-7 .elementor-grid {
        grid-template-columns: repeat(7,1fr)
    }

    .elementor-grid-tablet-8 .elementor-grid {
        grid-template-columns: repeat(8,1fr)
    }

    .elementor-grid-tablet-9 .elementor-grid {
        grid-template-columns: repeat(9,1fr)
    }

    .elementor-grid-tablet-10 .elementor-grid {
        grid-template-columns: repeat(10,1fr)
    }

    .elementor-grid-tablet-11 .elementor-grid {
        grid-template-columns: repeat(11,1fr)
    }

    .elementor-grid-tablet-12 .elementor-grid {
        grid-template-columns: repeat(12,1fr)
    }
}

@media (max-width: -1) {
    .elementor-grid-mobile_extra-0 .elementor-grid {
        display:inline-block;
        width: 100%;
        word-spacing: var(--grid-column-gap);
        margin-bottom: calc(-1 * var(--grid-row-gap))
    }

    .elementor-grid-mobile_extra-0 .elementor-grid .elementor-grid-item {
        display: inline-block;
        margin-bottom: var(--grid-row-gap);
        word-break: break-word
    }

    .elementor-grid-mobile_extra-1 .elementor-grid {
        grid-template-columns: repeat(1,1fr)
    }

    .elementor-grid-mobile_extra-2 .elementor-grid {
        grid-template-columns: repeat(2,1fr)
    }

    .elementor-grid-mobile_extra-3 .elementor-grid {
        grid-template-columns: repeat(3,1fr)
    }

    .elementor-grid-mobile_extra-4 .elementor-grid {
        grid-template-columns: repeat(4,1fr)
    }

    .elementor-grid-mobile_extra-5 .elementor-grid {
        grid-template-columns: repeat(5,1fr)
    }

    .elementor-grid-mobile_extra-6 .elementor-grid {
        grid-template-columns: repeat(6,1fr)
    }

    .elementor-grid-mobile_extra-7 .elementor-grid {
        grid-template-columns: repeat(7,1fr)
    }

    .elementor-grid-mobile_extra-8 .elementor-grid {
        grid-template-columns: repeat(8,1fr)
    }

    .elementor-grid-mobile_extra-9 .elementor-grid {
        grid-template-columns: repeat(9,1fr)
    }

    .elementor-grid-mobile_extra-10 .elementor-grid {
        grid-template-columns: repeat(10,1fr)
    }

    .elementor-grid-mobile_extra-11 .elementor-grid {
        grid-template-columns: repeat(11,1fr)
    }

    .elementor-grid-mobile_extra-12 .elementor-grid {
        grid-template-columns: repeat(12,1fr)
    }
}

@media (max-width: 767px) {
    .elementor-grid-mobile-0 .elementor-grid {
        display:inline-block;
        width: 100%;
        word-spacing: var(--grid-column-gap);
        margin-bottom: calc(-1 * var(--grid-row-gap))
    }

    .elementor-grid-mobile-0 .elementor-grid .elementor-grid-item {
        display: inline-block;
        margin-bottom: var(--grid-row-gap);
        word-break: break-word
    }

    .elementor-grid-mobile-1 .elementor-grid {
        grid-template-columns: repeat(1,1fr)
    }

    .elementor-grid-mobile-2 .elementor-grid {
        grid-template-columns: repeat(2,1fr)
    }

    .elementor-grid-mobile-3 .elementor-grid {
        grid-template-columns: repeat(3,1fr)
    }

    .elementor-grid-mobile-4 .elementor-grid {
        grid-template-columns: repeat(4,1fr)
    }

    .elementor-grid-mobile-5 .elementor-grid {
        grid-template-columns: repeat(5,1fr)
    }

    .elementor-grid-mobile-6 .elementor-grid {
        grid-template-columns: repeat(6,1fr)
    }

    .elementor-grid-mobile-7 .elementor-grid {
        grid-template-columns: repeat(7,1fr)
    }

    .elementor-grid-mobile-8 .elementor-grid {
        grid-template-columns: repeat(8,1fr)
    }

    .elementor-grid-mobile-9 .elementor-grid {
        grid-template-columns: repeat(9,1fr)
    }

    .elementor-grid-mobile-10 .elementor-grid {
        grid-template-columns: repeat(10,1fr)
    }

    .elementor-grid-mobile-11 .elementor-grid {
        grid-template-columns: repeat(11,1fr)
    }

    .elementor-grid-mobile-12 .elementor-grid {
        grid-template-columns: repeat(12,1fr)
    }
}

@media (min-width: 1025px) {
    #elementor-device-mode:after {
        content:"desktop"
    }
}

@media (min-width: -1) {
    #elementor-device-mode:after {
        content:"widescreen"
    }
}

@media (max-width: -1) {
    #elementor-device-mode:after {
        content:"laptop";
        content: "tablet_extra"
    }
}

@media (max-width: 1024px) {
    #elementor-device-mode:after {
        content:"tablet"
    }
}

@media (max-width: -1) {
    #elementor-device-mode:after {
        content:"mobile_extra"
    }
}

@media (max-width: 767px) {
    #elementor-device-mode:after {
        content:"mobile"
    }
}

.e-con {
    --border-radius: 0;
    --display: flex;
    --flex-direction: column;
    --flex-basis: auto;
    --flex-grow: 0;
    --flex-shrink: 1;
    --container-widget-width: 100%;
    --container-widget-height: initial;
    --container-widget-flex-grow: 0;
    --container-widget-align-self: initial;
    --content-width: Min(100%,var(--container-max-width,1140px));
    --width: 100%;
    --min-height: initial;
    --height: auto;
    --text-align: initial;
    --margin-top: 0;
    --margin-right: 0;
    --margin-bottom: 0;
    --margin-left: 0;
    --padding-top: var(--container-default-padding-top,10px);
    --padding-right: var(--container-default-padding-right,10px);
    --padding-bottom: var(--container-default-padding-bottom,10px);
    --padding-left: var(--container-default-padding-left,10px);
    --position: relative;
    --z-index: revert;
    --overflow: visible;
    --gap: var(--widgets-spacing,20px);
    --overlay-mix-blend-mode: initial;
    --overlay-opacity: 1;
    --overlay-transition: 0.3s;
    position: var(--position);
    flex: var(--flex-grow) var(--flex-shrink) var(--flex-basis);
    width: var(--width);
    min-width: 0;
    min-height: var(--min-height);
    height: var(--height);
    border-radius: var(--border-radius);
    margin: var(--margin-top) var(--margin-right) var(--margin-bottom) var(--margin-left);
    padding-left: var(--padding-left);
    padding-right: var(--padding-right);
    z-index: var(--z-index);
    overflow: var(--overflow);
    transition: background var(--background-transition,.3s),border var(--border-transition,.3s),box-shadow var(--border-transition,.3s),transform var(--e-con-transform-transition-duration,.4s)
}

.e-con-full,.e-con>.e-con-inner {
    flex-direction: var(--flex-direction);
    text-align: var(--text-align);
    padding-top: var(--padding-top);
    padding-bottom: var(--padding-bottom)
}

.e-con,.e-con>.e-con-inner {
    display: var(--display)
}

.e-con-boxed {
    flex-direction: column;
    text-align: initial;
    flex-wrap: nowrap;
    justify-content: normal;
    align-items: normal;
    align-content: normal;
    gap: initial
}

.e-con>.e-con-inner {
    flex-wrap: var(--flex-wrap);
    justify-content: var(--justify-content);
    align-items: var(--align-items);
    align-content: var(--align-content);
    gap: var(--gap);
    width: 100%;
    max-width: var(--content-width);
    margin: 0 auto;
    padding-inline:0;height: 100%;
    flex-basis: auto;
    flex-grow: 1;
    flex-shrink: 1;
    align-self: auto
}

:is(.elementor-section-wrap,[data-elementor-id])>.e-con {
    --margin-right: auto;
    --margin-left: auto;
    max-width: min(100%,var(--width))
}

.e-con .elementor-widget.elementor-widget {
    margin-bottom: 0
}

.e-con:before,.e-con>.e-con-inner>.elementor-background-slideshow:before,.e-con>.e-con-inner>.elementor-background-video-container:before,.e-con>.elementor-background-slideshow:before,.e-con>.elementor-background-video-container:before,.e-con>.elementor-motion-effects-container>.elementor-motion-effects-layer:before {
    content: var(--background-overlay);
    display: block;
    position: absolute;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    mix-blend-mode: var(--overlay-mix-blend-mode);
    opacity: var(--overlay-opacity);
    transition: var(--overlay-transition,.3s);
    border-radius: var(--border-radius)
}

.e-con:before {
    transition: background var(--overlay-transition,.3s),border-radius var(--border-transition,.3s),opacity var(--overlay-transition,.3s)
}

.e-con>.e-con-inner>.elementor-background-video-container:before,.e-con>.elementor-background-video-container:before {
    z-index: 1
}

.e-con>.e-con-inner>.elementor-background-slideshow:before,.e-con>.elementor-background-slideshow:before {
    z-index: 2
}

.e-con .elementor-widget {
    min-width: 0
}

.e-con .elementor-widget-empty,.e-con .elementor-widget-google_maps,.e-con .elementor-widget-video,.e-con .elementor-widget.e-widget-swiper {
    width: 100%
}

.e-con>.e-con-inner>.elementor-widget>.elementor-widget-container,.e-con>.elementor-widget>.elementor-widget-container {
    height: 100%
}

.e-con.e-con>.e-con-inner>.elementor-widget,.elementor.elementor .e-con>.elementor-widget {
    max-width: 100%
}

@media (max-width: 767px) {
    .e-con {
        --width:100%;
        --flex-wrap: wrap
    }
}

.elementor-form-fields-wrapper {
    display: flex;
    flex-wrap: wrap
}

.elementor-form-fields-wrapper.elementor-labels-above .elementor-field-group .elementor-field-subgroup,.elementor-form-fields-wrapper.elementor-labels-above .elementor-field-group>.elementor-select-wrapper,.elementor-form-fields-wrapper.elementor-labels-above .elementor-field-group>input,.elementor-form-fields-wrapper.elementor-labels-above .elementor-field-group>textarea {
    flex-basis: 100%;
    max-width: 100%
}

.elementor-form-fields-wrapper.elementor-labels-inline>.elementor-field-group .elementor-select-wrapper,.elementor-form-fields-wrapper.elementor-labels-inline>.elementor-field-group>input {
    flex-grow: 1
}

.elementor-field-group {
    flex-wrap: wrap;
    align-items: center
}

.elementor-field-group.elementor-field-type-submit {
    align-items: flex-end
}

.elementor-field-group .elementor-field-textual {
    width: 100%;
    max-width: 100%;
    border: 1px solid #818a91;
    background-color: transparent;
    color: #373a3c;
    vertical-align: middle;
    flex-grow: 1
}

.elementor-field-group .elementor-field-textual:focus {
    box-shadow: inset 0 0 0 1px rgba(0,0,0,.1);
    outline: 0
}

.elementor-field-group .elementor-field-textual::-moz-placeholder {
    color: inherit;
    font-family: inherit;
    opacity: .6
}

.elementor-field-group .elementor-field-textual::placeholder {
    color: inherit;
    font-family: inherit;
    opacity: .6
}

.elementor-field-group .elementor-select-wrapper {
    display: flex;
    position: relative;
    width: 100%
}

.elementor-field-group .elementor-select-wrapper select {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    color: inherit;
    font-size: inherit;
    font-family: inherit;
    font-weight: inherit;
    font-style: inherit;
    text-transform: inherit;
    letter-spacing: inherit;
    line-height: inherit;
    flex-basis: 100%;
    padding-right: 20px
}

.elementor-field-group .elementor-select-wrapper:before {
    content: "\e92a";
    font-family: eicons;
    font-size: 15px;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    right: 10px;
    pointer-events: none;
    text-shadow: 0 0 3px rgba(0,0,0,.3)
}

.elementor-field-group.elementor-field-type-select-multiple .elementor-select-wrapper:before {
    content: ""
}

.elementor-field-subgroup {
    display: flex;
    flex-wrap: wrap
}

.elementor-field-subgroup .elementor-field-option label {
    display: inline-block
}

.elementor-field-subgroup.elementor-subgroup-inline .elementor-field-option {
    padding-right: 10px
}

.elementor-field-subgroup:not(.elementor-subgroup-inline) .elementor-field-option {
    flex-basis: 100%
}

.elementor-field-type-acceptance .elementor-field-subgroup .elementor-field-option input,.elementor-field-type-acceptance .elementor-field-subgroup .elementor-field-option label,.elementor-field-type-checkbox .elementor-field-subgroup .elementor-field-option input,.elementor-field-type-checkbox .elementor-field-subgroup .elementor-field-option label,.elementor-field-type-radio .elementor-field-subgroup .elementor-field-option input,.elementor-field-type-radio .elementor-field-subgroup .elementor-field-option label {
    display: inline
}

.elementor-field-label {
    cursor: pointer
}

.elementor-mark-required .elementor-field-label:after {
    content: "*";
    color: red;
    padding-left: .2em
}

.elementor-field-textual {
    line-height: 1.4;
    font-size: 15px;
    min-height: 40px;
    padding: 5px 14px;
    border-radius: 3px
}

.elementor-field-textual.elementor-size-xs {
    font-size: 13px;
    min-height: 33px;
    padding: 4px 12px;
    border-radius: 2px
}

.elementor-field-textual.elementor-size-md {
    font-size: 16px;
    min-height: 47px;
    padding: 6px 16px;
    border-radius: 4px
}

.elementor-field-textual.elementor-size-lg {
    font-size: 18px;
    min-height: 59px;
    padding: 7px 20px;
    border-radius: 5px
}

.elementor-field-textual.elementor-size-xl {
    font-size: 20px;
    min-height: 72px;
    padding: 8px 24px;
    border-radius: 6px
}

.elementor-button-align-stretch .elementor-field-type-submit:not(.e-form__buttons__wrapper) .elementor-button {
    flex-basis: 100%
}

.elementor-button-align-stretch .e-form__buttons__wrapper {
    flex-basis: 50%;
    flex-grow: 1
}

.elementor-button-align-stretch .e-form__buttons__wrapper__button {
    flex-basis: 100%
}

.elementor-button-align-center .e-form__buttons,.elementor-button-align-center .elementor-field-type-submit {
    justify-content: center
}

.elementor-button-align-start .e-form__buttons,.elementor-button-align-start .elementor-field-type-submit {
    justify-content: flex-start
}

.elementor-button-align-end .e-form__buttons,.elementor-button-align-end .elementor-field-type-submit {
    justify-content: flex-end
}

.elementor-button-align-center .elementor-field-type-submit:not(.e-form__buttons__wrapper) .elementor-button,.elementor-button-align-end .elementor-field-type-submit:not(.e-form__buttons__wrapper) .elementor-button,.elementor-button-align-start .elementor-field-type-submit:not(.e-form__buttons__wrapper) .elementor-button {
    flex-basis: auto
}

.elementor-button-align-center .e-form__buttons__wrapper,.elementor-button-align-end .e-form__buttons__wrapper,.elementor-button-align-start .e-form__buttons__wrapper {
    flex-grow: 0
}

.elementor-button-align-center .e-form__buttons__wrapper,.elementor-button-align-center .e-form__buttons__wrapper__button,.elementor-button-align-end .e-form__buttons__wrapper,.elementor-button-align-end .e-form__buttons__wrapper__button,.elementor-button-align-start .e-form__buttons__wrapper,.elementor-button-align-start .e-form__buttons__wrapper__button {
    flex-basis: auto
}

@media screen and (max-width: 1024px) {
    .elementor-tablet-button-align-stretch .elementor-field-type-submit:not(.e-form__buttons__wrapper) .elementor-button {
        flex-basis:100%
    }

    .elementor-tablet-button-align-stretch .e-form__buttons__wrapper {
        flex-basis: 50%;
        flex-grow: 1
    }

    .elementor-tablet-button-align-stretch .e-form__buttons__wrapper__button {
        flex-basis: 100%
    }

    .elementor-tablet-button-align-center .e-form__buttons,.elementor-tablet-button-align-center .elementor-field-type-submit {
        justify-content: center
    }

    .elementor-tablet-button-align-start .e-form__buttons,.elementor-tablet-button-align-start .elementor-field-type-submit {
        justify-content: flex-start
    }

    .elementor-tablet-button-align-end .e-form__buttons,.elementor-tablet-button-align-end .elementor-field-type-submit {
        justify-content: flex-end
    }

    .elementor-tablet-button-align-center .elementor-field-type-submit:not(.e-form__buttons__wrapper) .elementor-button,.elementor-tablet-button-align-end .elementor-field-type-submit:not(.e-form__buttons__wrapper) .elementor-button,.elementor-tablet-button-align-start .elementor-field-type-submit:not(.e-form__buttons__wrapper) .elementor-button {
        flex-basis: auto
    }

    .elementor-tablet-button-align-center .e-form__buttons__wrapper,.elementor-tablet-button-align-end .e-form__buttons__wrapper,.elementor-tablet-button-align-start .e-form__buttons__wrapper {
        flex-grow: 0
    }

    .elementor-tablet-button-align-center .e-form__buttons__wrapper,.elementor-tablet-button-align-center .e-form__buttons__wrapper__button,.elementor-tablet-button-align-end .e-form__buttons__wrapper,.elementor-tablet-button-align-end .e-form__buttons__wrapper__button,.elementor-tablet-button-align-start .e-form__buttons__wrapper,.elementor-tablet-button-align-start .e-form__buttons__wrapper__button {
        flex-basis: auto
    }
}

@media screen and (max-width: 767px) {
    .elementor-mobile-button-align-stretch .elementor-field-type-submit:not(.e-form__buttons__wrapper) .elementor-button {
        flex-basis:100%
    }

    .elementor-mobile-button-align-stretch .e-form__buttons__wrapper {
        flex-basis: 50%;
        flex-grow: 1
    }

    .elementor-mobile-button-align-stretch .e-form__buttons__wrapper__button {
        flex-basis: 100%
    }

    .elementor-mobile-button-align-center .e-form__buttons,.elementor-mobile-button-align-center .elementor-field-type-submit {
        justify-content: center
    }

    .elementor-mobile-button-align-start .e-form__buttons,.elementor-mobile-button-align-start .elementor-field-type-submit {
        justify-content: flex-start
    }

    .elementor-mobile-button-align-end .e-form__buttons,.elementor-mobile-button-align-end .elementor-field-type-submit {
        justify-content: flex-end
    }

    .elementor-mobile-button-align-center .elementor-field-type-submit:not(.e-form__buttons__wrapper) .elementor-button,.elementor-mobile-button-align-end .elementor-field-type-submit:not(.e-form__buttons__wrapper) .elementor-button,.elementor-mobile-button-align-start .elementor-field-type-submit:not(.e-form__buttons__wrapper) .elementor-button {
        flex-basis: auto
    }

    .elementor-mobile-button-align-center .e-form__buttons__wrapper,.elementor-mobile-button-align-end .e-form__buttons__wrapper,.elementor-mobile-button-align-start .e-form__buttons__wrapper {
        flex-grow: 0
    }

    .elementor-mobile-button-align-center .e-form__buttons__wrapper,.elementor-mobile-button-align-center .e-form__buttons__wrapper__button,.elementor-mobile-button-align-end .e-form__buttons__wrapper,.elementor-mobile-button-align-end .e-form__buttons__wrapper__button,.elementor-mobile-button-align-start .e-form__buttons__wrapper,.elementor-mobile-button-align-start .e-form__buttons__wrapper__button {
        flex-basis: auto
    }
}

.elementor-error .elementor-field {
    border-color: #d9534f
}

.elementor-error .help-inline {
    color: #d9534f;
    font-size: .9em
}

.elementor-message {
    margin: 10px 0;
    font-size: 1em;
    line-height: 1
}

.elementor-message:before {
    content: "\e90e";
    display: inline-block;
    font-family: eicons;
    font-weight: 400;
    font-style: normal;
    vertical-align: middle;
    margin-right: 5px
}

.elementor-message.elementor-message-danger {
    color: #d9534f
}

.elementor-message.elementor-message-danger:before {
    content: "\e87f"
}

.elementor-message.form-message-success {
    color: #5cb85c
}

.elementor-form .elementor-button {
    padding-top: 0;
    padding-bottom: 0;
    border: none
}

.elementor-form .elementor-button>span {
    display: flex;
    justify-content: center
}

.elementor-form .elementor-button.elementor-size-xs {
    min-height: 33px
}

.elementor-form .elementor-button.elementor-size-sm {
    min-height: 40px
}

.elementor-form .elementor-button.elementor-size-md {
    min-height: 47px
}

.elementor-form .elementor-button.elementor-size-lg {
    min-height: 59px
}

.elementor-form .elementor-button.elementor-size-xl {
    min-height: 72px
}

.elementor-element .elementor-widget-container {
    transition: background .3s,border .3s,border-radius .3s,box-shadow .3s,transform var(--e-transform-transition-duration,.4s)
}

.elementor-button {
    display: inline-block;
    line-height: 1;
    background-color: #818a91;
    font-size: 15px;
    padding: 12px 24px;
    border-radius: 3px;
    color: #fff;
    fill: #fff;
    text-align: center;
    transition: all .3s
}

.elementor-button:focus,.elementor-button:hover,.elementor-button:visited {
    color: #fff
}

.elementor-button-content-wrapper {
    display: flex;
    justify-content: center
}

.elementor-button-icon {
    flex-grow: 0;
    order: 5
}

.elementor-button-icon svg {
    width: 1em;
    height: auto
}

.elementor-button-icon .e-font-icon-svg {
    height: 1em
}

.elementor-button-text {
    flex-grow: 1;
    order: 10;
    display: inline-block
}

.elementor-button.elementor-size-xs {
    font-size: 13px;
    padding: 10px 20px;
    border-radius: 2px
}

.elementor-button.elementor-size-md {
    font-size: 16px;
    padding: 15px 30px;
    border-radius: 4px
}

.elementor-button.elementor-size-lg {
    font-size: 18px;
    padding: 20px 40px;
    border-radius: 5px
}

.elementor-button.elementor-size-xl {
    font-size: 20px;
    padding: 25px 50px;
    border-radius: 6px
}

.elementor-button .elementor-align-icon-right {
    margin-left: 5px;
    order: 15
}

.elementor-button .elementor-align-icon-left {
    margin-right: 5px;
    order: 5
}

.elementor-button span {
    text-decoration: inherit
}

.elementor-element.elementor-button-info .elementor-button {
    background-color: #5bc0de
}

.elementor-element.elementor-button-success .elementor-button {
    background-color: #5cb85c
}

.elementor-element.elementor-button-warning .elementor-button {
    background-color: #f0ad4e
}

.elementor-element.elementor-button-danger .elementor-button {
    background-color: #d9534f
}

.elementor-widget-button .elementor-button .elementor-button-info {
    background-color: #5bc0de
}

.elementor-widget-button .elementor-button .elementor-button-success {
    background-color: #5cb85c
}

.elementor-widget-button .elementor-button .elementor-button-warning {
    background-color: #f0ad4e
}

.elementor-widget-button .elementor-button .elementor-button-danger {
    background-color: #d9534f
}

.elementor-tab-title a {
    color: inherit
}

.elementor-view-stacked .elementor-icon {
    padding: .5em;
    background-color: #818a91;
    color: #fff;
    fill: #fff
}

.elementor-view-framed .elementor-icon {
    padding: .5em;
    color: #818a91;
    border: 3px solid #818a91;
    background-color: transparent
}

.elementor-icon {
    display: inline-block;
    line-height: 1;
    transition: all .3s;
    color: #818a91;
    font-size: 50px;
    text-align: center
}

.elementor-icon:hover {
    color: #818a91
}

.elementor-icon i,.elementor-icon svg {
    width: 1em;
    height: 1em;
    position: relative;
    display: block
}

.elementor-icon i:before,.elementor-icon svg:before {
    position: absolute;
    left: 50%;
    transform: translateX(-50%)
}

.elementor-icon i.fad {
    width: auto
}

.elementor-shape-circle .elementor-icon {
    border-radius: 50%
}

.e-transform .elementor-widget-container {
    transform: perspective(var(--e-transform-perspective,0)) rotate(var(--e-transform-rotateZ,0)) rotateX(var(--e-transform-rotateX,0)) rotateY(var(--e-transform-rotateY,0)) translate(var(--e-transform-translate,0)) translateX(var(--e-transform-translateX,0)) translateY(var(--e-transform-translateY,0)) scaleX(calc(var(--e-transform-flipX, 1) * var(--e-transform-scaleX, var(--e-transform-scale, 1)))) scaleY(calc(var(--e-transform-flipY, 1) * var(--e-transform-scaleY, var(--e-transform-scale, 1)))) skewX(var(--e-transform-skewX,0)) skewY(var(--e-transform-skewY,0));
    transform-origin: var(--e-transform-origin-y) var(--e-transform-origin-x)
}

.e-con.e-transform {
    transform: perspective(var(--e-con-transform-perspective,0)) rotate(var(--e-con-transform-rotateZ,0)) rotateX(var(--e-con-transform-rotateX,0)) rotateY(var(--e-con-transform-rotateY,0)) translate(var(--e-con-transform-translate,0)) translateX(var(--e-con-transform-translateX,0)) translateY(var(--e-con-transform-translateY,0)) scaleX(calc(var(--e-con-transform-flipX, 1) * var(--e-con-transform-scaleX, var(--e-con-transform-scale, 1)))) scaleY(calc(var(--e-con-transform-flipY, 1) * var(--e-con-transform-scaleY, var(--e-con-transform-scale, 1)))) skewX(var(--e-con-transform-skewX,0)) skewY(var(--e-con-transform-skewY,0));
    transform-origin: var(--e-con-transform-origin-y) var(--e-con-transform-origin-x)
}

.elementor-element,.elementor-lightbox {
    --swiper-theme-color: #000;
    --swiper-navigation-size: 44px;
    --swiper-pagination-bullet-size: 6px;
    --swiper-pagination-bullet-horizontal-gap: 6px
}

.elementor-element .swiper .swiper-slide figure,.elementor-lightbox .swiper .swiper-slide figure {
    line-height: 0
}

.elementor-element .swiper .elementor-lightbox-content-source,.elementor-lightbox .swiper .elementor-lightbox-content-source {
    display: none
}

.elementor-element .swiper .elementor-swiper-button,.elementor-lightbox .swiper .elementor-swiper-button {
    position: absolute;
    display: inline-flex;
    z-index: 1;
    cursor: pointer;
    font-size: 25px;
    color: hsla(0,0%,93.3%,.9);
    top: 50%;
    transform: translateY(-50%)
}

.elementor-element .swiper .elementor-swiper-button svg,.elementor-lightbox .swiper .elementor-swiper-button svg {
    fill: hsla(0,0%,93.3%,.9);
    height: 1em;
    width: 1em
}

.elementor-element .swiper .elementor-swiper-button-prev,.elementor-lightbox .swiper .elementor-swiper-button-prev {
    left: 10px
}

.elementor-element .swiper .elementor-swiper-button-next,.elementor-lightbox .swiper .elementor-swiper-button-next {
    right: 10px
}

.elementor-element .swiper .elementor-swiper-button.swiper-button-disabled,.elementor-lightbox .swiper .elementor-swiper-button.swiper-button-disabled {
    opacity: .3
}

.elementor-element .swiper .swiper-image-stretch .swiper-slide .swiper-slide-image,.elementor-lightbox .swiper .swiper-image-stretch .swiper-slide .swiper-slide-image {
    width: 100%
}

.elementor-element .swiper .swiper-horizontal>.swiper-pagination-bullets,.elementor-element .swiper .swiper-pagination-bullets.swiper-pagination-horizontal,.elementor-element .swiper .swiper-pagination-custom,.elementor-element .swiper .swiper-pagination-fraction,.elementor-lightbox .swiper .swiper-horizontal>.swiper-pagination-bullets,.elementor-lightbox .swiper .swiper-pagination-bullets.swiper-pagination-horizontal,.elementor-lightbox .swiper .swiper-pagination-custom,.elementor-lightbox .swiper .swiper-pagination-fraction {
    bottom: 5px
}

.elementor-element .swiper.swiper-cube .elementor-swiper-button,.elementor-lightbox .swiper.swiper-cube .elementor-swiper-button {
    transform: translate3d(0,-50%,1px)
}

.elementor-element.elementor-pagination-position-outside .swiper,.elementor-lightbox.elementor-pagination-position-outside .swiper {
    padding-bottom: 30px
}

.elementor-element.elementor-pagination-position-outside .swiper .elementor-swiper-button,.elementor-lightbox.elementor-pagination-position-outside .swiper .elementor-swiper-button {
    top: calc(50% - 30px / 2)
}

.elementor-element .elementor-swiper,.elementor-lightbox .elementor-swiper {
    position: relative
}

.elementor-element .elementor-main-swiper,.elementor-lightbox .elementor-main-swiper {
    position: static
}

.elementor-element.elementor-arrows-position-outside .swiper,.elementor-lightbox.elementor-arrows-position-outside .swiper {
    width: calc(100% - 60px)
}

.elementor-element.elementor-arrows-position-outside .swiper .elementor-swiper-button-prev,.elementor-lightbox.elementor-arrows-position-outside .swiper .elementor-swiper-button-prev {
    left: 0
}

.elementor-element.elementor-arrows-position-outside .swiper .elementor-swiper-button-next,.elementor-lightbox.elementor-arrows-position-outside .swiper .elementor-swiper-button-next {
    right: 0
}

.elementor-lightbox {
    --lightbox-ui-color: hsla(0,0%,93.3%,0.9);
    --lightbox-ui-color-hover: #fff;
    --lightbox-text-color: var(--lightbox-ui-color);
    --lightbox-header-icons-size: 20px;
    --lightbox-navigation-icons-size: 25px
}

.elementor-lightbox .dialog-header {
    display: none
}

.elementor-lightbox .dialog-widget-content {
    background: none;
    box-shadow: none;
    width: 100%;
    height: 100%
}

.elementor-lightbox .dialog-message {
    animation-duration: .3s
}

.elementor-lightbox .dialog-message:not(.elementor-fit-aspect-ratio) {
    height: 100%
}

.elementor-lightbox .dialog-message.dialog-lightbox-message {
    padding: 0
}

.elementor-lightbox .dialog-lightbox-close-button {
    cursor: pointer;
    position: absolute;
    font-size: var(--lightbox-header-icons-size);
    right: .75em;
    margin-top: 13px;
    padding: .25em;
    z-index: 2;
    line-height: 1;
    display: flex
}

.elementor-lightbox .dialog-lightbox-close-button svg {
    height: 1em;
    width: 1em
}

.elementor-lightbox .dialog-lightbox-close-button,.elementor-lightbox .elementor-swiper-button {
    color: var(--lightbox-ui-color);
    transition: all .3s;
    opacity: 1
}

.elementor-lightbox .dialog-lightbox-close-button svg,.elementor-lightbox .elementor-swiper-button svg {
    fill: var(--lightbox-ui-color)
}

.elementor-lightbox .dialog-lightbox-close-button:hover,.elementor-lightbox .elementor-swiper-button:hover {
    color: var(--lightbox-ui-color-hover)
}

.elementor-lightbox .dialog-lightbox-close-button:hover svg,.elementor-lightbox .elementor-swiper-button:hover svg {
    fill: var(--lightbox-ui-color-hover)
}

.elementor-lightbox .swiper,.elementor-lightbox .swiper-container {
    height: 100%
}

.elementor-lightbox .elementor-lightbox-item {
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    padding: 70px;
    box-sizing: border-box;
    height: 100%;
    margin: auto
}

@media (max-width: 767px) {
    .elementor-lightbox .elementor-lightbox-item {
        padding:70px 0
    }
}

.elementor-lightbox .elementor-lightbox-image {
    max-height: 100%;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none
}

.elementor-lightbox .elementor-lightbox-image,.elementor-lightbox .elementor-lightbox-image:hover {
    opacity: 1;
    filter: none;
    border: none
}

.elementor-lightbox .elementor-lightbox-image,.elementor-lightbox .elementor-video-container {
    box-shadow: 0 0 30px rgba(0,0,0,.3),0 0 8px -5px rgba(0,0,0,.3);
    border-radius: 2px
}

.elementor-lightbox .elementor-video-container {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%)
}

@media (min-width: 1025px) {
    .elementor-lightbox .elementor-video-container {
        width:75%
    }
}

@media (max-width: 1024px) {
    .elementor-lightbox .elementor-video-container {
        width:100%
    }
}

@media (min-width: 768px) and (max-width:1024px) {
    .elementor-lightbox .elementor-aspect-ratio-916 .elementor-video-container {
        width:70%
    }
}

.elementor-lightbox .swiper-container .elementor-swiper-button-prev,.elementor-lightbox .swiper .elementor-swiper-button-prev {
    left: 0
}

.elementor-lightbox .swiper-container .elementor-swiper-button-next,.elementor-lightbox .swiper .elementor-swiper-button-next {
    right: 0
}

.elementor-lightbox .swiper-container .swiper-pagination-fraction,.elementor-lightbox .swiper .swiper-pagination-fraction {
    width: -moz-max-content;
    width: max-content;
    color: #fff
}

.elementor-lightbox .elementor-swiper-button:focus {
    outline-width: 1px
}

.elementor-lightbox .elementor-swiper-button-next,.elementor-lightbox .elementor-swiper-button-prev {
    height: 100%;
    display: flex;
    align-items: center;
    width: 15%;
    justify-content: center;
    font-size: var(--lightbox-navigation-icons-size)
}

@media (max-width: 767px) {
    .elementor-lightbox .elementor-swiper-button:focus {
        outline:none
    }

    .elementor-lightbox .elementor-swiper-button-next,.elementor-lightbox .elementor-swiper-button-prev {
        width: 20%
    }

    .elementor-lightbox .elementor-swiper-button-next i,.elementor-lightbox .elementor-swiper-button-prev i {
        padding: 10px;
        background-color: rgba(0,0,0,.5)
    }

    .elementor-lightbox .elementor-swiper-button-prev {
        left: 0;
        justify-content: flex-start
    }

    .elementor-lightbox .elementor-swiper-button-next {
        right: 0;
        justify-content: flex-end
    }
}

.elementor-slideshow__counter {
    color: currentColor;
    font-size: .75em;
    width: -moz-max-content;
    width: max-content
}

.elementor-slideshow__footer,.elementor-slideshow__header {
    position: absolute;
    left: 0;
    width: 100%;
    padding: 15px 20px;
    transition: .3s
}

.elementor-slideshow__footer {
    color: var(--lightbox-text-color)
}

.elementor-slideshow__header {
    color: var(--lightbox-ui-color);
    display: flex;
    flex-direction: row-reverse;
    font-size: var(--lightbox-header-icons-size);
    padding-left: 1em;
    padding-right: 2.6em;
    top: 0;
    align-items: center;
    z-index: 10
}

.elementor-slideshow__header>i,.elementor-slideshow__header>svg {
    cursor: pointer;
    padding: .25em;
    margin: 0 .35em
}

.elementor-slideshow__header>i {
    font-size: inherit
}

.elementor-slideshow__header>i:hover {
    color: var(--lightbox-ui-color-hover)
}

.elementor-slideshow__header>svg {
    box-sizing: content-box;
    fill: var(--lightbox-ui-color);
    height: 1em;
    width: 1em
}

.elementor-slideshow__header>svg:hover {
    fill: var(--lightbox-ui-color-hover)
}

.elementor-slideshow__header .elementor-slideshow__counter {
    margin-right: auto
}

.elementor-slideshow__header .elementor-icon-share {
    z-index: 5
}

.elementor-slideshow__share-menu {
    background-color: transparent;
    width: 0;
    height: 0;
    position: absolute;
    overflow: hidden;
    transition: background-color .4s
}

.elementor-slideshow__share-menu .elementor-slideshow__share-links a {
    color: #2c2c2c
}

.elementor-slideshow__share-links {
    display: block;
    position: absolute;
    min-width: 200px;
    right: 2.8em;
    top: 3em;
    background-color: #fff;
    border-radius: 3px;
    padding: 14px 20px;
    transform: scale(0);
    opacity: 0;
    transform-origin: 90% 10%;
    transition: all .25s .1s;
    box-shadow: 0 4px 15px rgba(0,0,0,.3)
}

.elementor-slideshow__share-links a {
    text-align: left;
    color: #55595c;
    font-size: 12px;
    line-height: 2.5;
    display: block;
    opacity: 0;
    transition: opacity .5s .1s
}

.elementor-slideshow__share-links a:hover {
    color: #000
}

.elementor-slideshow__share-links a i,.elementor-slideshow__share-links a svg {
    margin-right: .75em
}

.elementor-slideshow__share-links a i {
    font-size: 1.25em
}

.elementor-slideshow__share-links a svg {
    height: 1.25em;
    width: 1.25em
}

.elementor-slideshow__share-links:before {
    content: "";
    display: block;
    position: absolute;
    top: 1px;
    right: .5em;
    border: .45em solid transparent;
    border-bottom-color: #fff;
    transform: translateY(-100%) scaleX(.7)
}

.elementor-slideshow__footer {
    bottom: 0;
    z-index: 5;
    position: fixed
}

.elementor-slideshow__description,.elementor-slideshow__title {
    margin: 0
}

.elementor-slideshow__title {
    font-size: 16px;
    font-weight: 700
}

.elementor-slideshow__description {
    font-size: 14px
}

.elementor-slideshow--ui-hidden .elementor-slideshow__footer,.elementor-slideshow--ui-hidden .elementor-slideshow__header {
    opacity: 0;
    pointer-events: none
}

.elementor-slideshow--ui-hidden .elementor-swiper-button-next,.elementor-slideshow--ui-hidden .elementor-swiper-button-prev {
    opacity: 0
}

.elementor-slideshow--fullscreen-mode .elementor-video-container {
    width: 100%
}

.elementor-slideshow--zoom-mode .elementor-slideshow__footer,.elementor-slideshow--zoom-mode .elementor-slideshow__header {
    background-color: rgba(0,0,0,.5)
}

.elementor-slideshow--zoom-mode .elementor-swiper-button-next,.elementor-slideshow--zoom-mode .elementor-swiper-button-prev {
    opacity: 0;
    pointer-events: none
}

.elementor-slideshow--share-mode .elementor-slideshow__share-menu {
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    opacity: 1;
    cursor: default;
    background-color: rgba(0,0,0,.5)
}

.elementor-slideshow--share-mode .elementor-slideshow__share-links {
    transform: scale(1)
}

.elementor-slideshow--share-mode .elementor-slideshow__share-links,.elementor-slideshow--share-mode .elementor-slideshow__share-links a {
    opacity: 1
}

.elementor-slideshow--share-mode .elementor-slideshow__share-links .eicon-twitter {
    color: #1da1f2
}

.elementor-slideshow--share-mode .elementor-slideshow__share-links .eicon-facebook {
    color: #3b5998
}

.elementor-slideshow--share-mode .elementor-slideshow__share-links .eicon-pinterest {
    color: #bd081c
}

.elementor-slideshow--share-mode .elementor-slideshow__share-links .eicon-download-bold {
    color: #a4afb7
}

.elementor-slideshow--share-mode .elementor-slideshow__share-links .e-eicon-twitter {
    fill: #1da1f2
}

.elementor-slideshow--share-mode .elementor-slideshow__share-links .e-eicon-facebook {
    fill: #3b5998
}

.elementor-slideshow--share-mode .elementor-slideshow__share-links .e-eicon-pinterest {
    fill: #bd081c
}

.elementor-slideshow--share-mode .elementor-slideshow__share-links .e-eicon-download-bold {
    fill: #a4afb7
}

.elementor-slideshow--share-mode .eicon-share-arrow {
    z-index: 2
}

.animated {
    animation-duration: 1.25s
}

.animated.animated-slow {
    animation-duration: 2s
}

.animated.animated-fast {
    animation-duration: .75s
}

.animated.infinite {
    animation-iteration-count: infinite
}

.animated.reverse {
    animation-direction: reverse;
    animation-fill-mode: forwards
}

@media (prefers-reduced-motion:reduce) {
    .animated {
        animation: none
    }
}

.elementor-shape {
    overflow: hidden;
    position: absolute;
    left: 0;
    width: 100%;
    line-height: 0;
    direction: ltr
}

.elementor-shape-top {
    top: -1px
}

.elementor-shape-top:not([data-negative=false]) svg {
    z-index: -1
}

.elementor-shape-bottom {
    bottom: -1px
}

.elementor-shape-bottom:not([data-negative=true]) svg {
    z-index: -1
}

.elementor-shape[data-negative=false].elementor-shape-bottom,.elementor-shape[data-negative=true].elementor-shape-top {
    transform: rotate(180deg)
}

.elementor-shape svg {
    display: block;
    width: calc(100% + 1.3px);
    position: relative;
    left: 50%;
    transform: translateX(-50%)
}

.elementor-shape .elementor-shape-fill {
    fill: #fff;
    transform-origin: center;
    transform: rotateY(0deg)
}

#wp-admin-bar-elementor_edit_page>.ab-item:before {
    content: "\e813";
    font-family: eicons;
    top: 3px;
    font-size: 18px
}

#wp-admin-bar-elementor_edit_page .ab-submenu .ab-item {
    display: flex;
    width: 200px
}

#wp-admin-bar-elementor_edit_page .elementor-edit-link-title {
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    width: 100%
}

#wp-admin-bar-elementor_edit_page .elementor-edit-link-type {
    background: #55595c;
    font-size: 11px;
    line-height: 9px;
    margin-top: 6px;
    padding: 4px 8px;
    border-radius: 3px
}

#wp-admin-bar-elementor_inspector>.ab-item:before {
    content: "\f348";
    top: 2px
}

#wpadminbar * {
    font-style: normal
}

.page-template-elementor_canvas.elementor-page:before {
    display: none
}

.elementor-post__thumbnail__link {
    transition: none
}

#left-area ul.elementor-icon-list-items,.elementor-edit-area .elementor-element ul.elementor-icon-list-items,.elementor .elementor-element ul.elementor-icon-list-items {
    padding: 0
}

.e--ua-appleWebkit.rtl {
    --flex-right: flex-start
}

.e--ua-appleWebkit .elementor-share-buttons--align-right,.e--ua-appleWebkit .elementor-widget-social-icons.e-grid-align-right {
    --justify-content: var(--flex-right,flex-end)
}

.e--ua-appleWebkit .elementor-share-buttons--align-center,.e--ua-appleWebkit .elementor-widget-social-icons.e-grid-align-center {
    --justify-content: center
}

.e--ua-appleWebkit .elementor-grid-0.elementor-share-buttons--align-center .elementor-grid,.e--ua-appleWebkit .elementor-grid-0.elementor-share-buttons--align-justify .elementor-grid,.e--ua-appleWebkit .elementor-grid-0.elementor-share-buttons--align-right .elementor-grid,.e--ua-appleWebkit .elementor-grid-0.elementor-widget-social-icons.e-grid-align-center .elementor-grid,.e--ua-appleWebkit .elementor-grid-0.elementor-widget-social-icons.e-grid-align-right .elementor-grid {
    width: auto;
    display: flex;
    flex-wrap: wrap;
    justify-content: var(--justify-content,space-between);
    margin-left: calc(-.5 * var(--grid-column-gap));
    margin-right: calc(-.5 * var(--grid-column-gap))
}

.e--ua-appleWebkit .elementor-grid-0.elementor-share-buttons--align-center .elementor-grid-item,.e--ua-appleWebkit .elementor-grid-0.elementor-share-buttons--align-justify .elementor-grid-item,.e--ua-appleWebkit .elementor-grid-0.elementor-share-buttons--align-right .elementor-grid-item,.e--ua-appleWebkit .elementor-grid-0.elementor-widget-social-icons.e-grid-align-center .elementor-grid-item,.e--ua-appleWebkit .elementor-grid-0.elementor-widget-social-icons.e-grid-align-right .elementor-grid-item {
    margin-left: calc(.5 * var(--grid-column-gap));
    margin-right: calc(.5 * var(--grid-column-gap))
}

.e--ua-appleWebkit .elementor-grid-0.elementor-share-buttons--align-left .elementor-grid,.e--ua-appleWebkit .elementor-grid-0.elementor-widget-social-icons.e-grid-align-left .elementor-grid {
    display: inline-block
}

.e--ua-appleWebkit .elementor-grid-0.elementor-share-buttons--align-left .elementor-grid,.e--ua-appleWebkit .elementor-grid-0.elementor-share-buttons--align-left .elementor-grid-item,.e--ua-appleWebkit .elementor-grid-0.elementor-widget-social-icons.e-grid-align-left .elementor-grid,.e--ua-appleWebkit .elementor-grid-0.elementor-widget-social-icons.e-grid-align-left .elementor-grid-item {
    margin-left: 0;
    margin-right: 0
}

@media (max-width: 1024px) {
    .e--ua-appleWebkit .elementor-share-buttons-tablet--align-right,.e--ua-appleWebkit .elementor-widget-social-icons.e-grid-align-tablet-right {
        --justify-content:var(--flex-right,flex-end)
    }

    .e--ua-appleWebkit .elementor-share-buttons-tablet--align-center,.e--ua-appleWebkit .elementor-widget-social-icons.e-grid-align-tablet-center {
        --justify-content: center
    }

    .e--ua-appleWebkit .elementor-grid-0.elementor-share-buttons--align-tablet-center .elementor-grid,.e--ua-appleWebkit .elementor-grid-0.elementor-share-buttons--align-tablet-justify .elementor-grid,.e--ua-appleWebkit .elementor-grid-0.elementor-share-buttons--align-tablet-right .elementor-grid,.e--ua-appleWebkit .elementor-grid-0.elementor-widget-social-icons.e-grid-align-tablet-center .elementor-grid,.e--ua-appleWebkit .elementor-grid-0.elementor-widget-social-icons.e-grid-align-tablet-right .elementor-grid {
        width: auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: var(--justify-content,space-between);
        margin-left: calc(-.5 * var(--grid-column-gap));
        margin-right: calc(-.5 * var(--grid-column-gap))
    }

    .e--ua-appleWebkit .elementor-grid-0.elementor-share-buttons--align-tablet-center .elementor-grid-item,.e--ua-appleWebkit .elementor-grid-0.elementor-share-buttons--align-tablet-justify .elementor-grid-item,.e--ua-appleWebkit .elementor-grid-0.elementor-share-buttons--align-tablet-right .elementor-grid-item,.e--ua-appleWebkit .elementor-grid-0.elementor-widget-social-icons.e-grid-align-tablet-center .elementor-grid-item,.e--ua-appleWebkit .elementor-grid-0.elementor-widget-social-icons.e-grid-align-tablet-right .elementor-grid-item {
        margin-left: calc(.5 * var(--grid-column-gap));
        margin-right: calc(.5 * var(--grid-column-gap))
    }

    .e--ua-appleWebkit .elementor-grid-0.elementor-share-buttons-tablet--align-left .elementor-grid,.e--ua-appleWebkit .elementor-grid-0.elementor-widget-social-icons.e-grid-align-tablet-left .elementor-grid {
        display: inline-block
    }

    .e--ua-appleWebkit .elementor-grid-0.elementor-share-buttons-tablet--align-left .elementor-grid,.e--ua-appleWebkit .elementor-grid-0.elementor-share-buttons-tablet--align-left .elementor-grid-item,.e--ua-appleWebkit .elementor-grid-0.elementor-widget-social-icons.e-grid-align-tablet-left .elementor-grid,.e--ua-appleWebkit .elementor-grid-0.elementor-widget-social-icons.e-grid-align-tablet-left .elementor-grid-item {
        margin-left: 0;
        margin-right: 0
    }
}

@media (max-width: 767px) {
    .e--ua-appleWebkit .elementor-share-buttons-mobile--align-right,.e--ua-appleWebkit .elementor-widget-social-icons.e-grid-align-mobile-right {
        --justify-content:var(--flex-right,flex-end)
    }

    .e--ua-appleWebkit .elementor-share-buttons-mobile--align-center,.e--ua-appleWebkit .elementor-widget-social-icons.e-grid-align-mobile-center {
        --justify-content: center
    }

    .e--ua-appleWebkit .elementor-grid-0.elementor-share-buttons--align-mobile-center .elementor-grid,.e--ua-appleWebkit .elementor-grid-0.elementor-share-buttons--align-mobile-justify .elementor-grid,.e--ua-appleWebkit .elementor-grid-0.elementor-share-buttons--align-mobile-right .elementor-grid,.e--ua-appleWebkit .elementor-grid-0.elementor-widget-social-icons.e-grid-align-mobile-center .elementor-grid,.e--ua-appleWebkit .elementor-grid-0.elementor-widget-social-icons.e-grid-align-mobile-right .elementor-grid {
        width: auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: var(--justify-content,space-between);
        margin-left: calc(-.5 * var(--grid-column-gap));
        margin-right: calc(-.5 * var(--grid-column-gap))
    }

    .e--ua-appleWebkit .elementor-grid-0.elementor-share-buttons--align-mobile-center .elementor-grid-item,.e--ua-appleWebkit .elementor-grid-0.elementor-share-buttons--align-mobile-justify .elementor-grid-item,.e--ua-appleWebkit .elementor-grid-0.elementor-share-buttons--align-mobile-right .elementor-grid-item,.e--ua-appleWebkit .elementor-grid-0.elementor-widget-social-icons.e-grid-align-mobile-center .elementor-grid-item,.e--ua-appleWebkit .elementor-grid-0.elementor-widget-social-icons.e-grid-align-mobile-right .elementor-grid-item {
        margin-left: calc(.5 * var(--grid-column-gap));
        margin-right: calc(.5 * var(--grid-column-gap))
    }

    .e--ua-appleWebkit .elementor-grid-0.elementor-share-buttons-mobile--align-left .elementor-grid,.e--ua-appleWebkit .elementor-grid-0.elementor-widget-social-icons.e-grid-align-mobile-left .elementor-grid {
        display: inline-block
    }

    .e--ua-appleWebkit .elementor-grid-0.elementor-share-buttons-mobile--align-left .elementor-grid,.e--ua-appleWebkit .elementor-grid-0.elementor-share-buttons-mobile--align-left .elementor-grid-item,.e--ua-appleWebkit .elementor-grid-0.elementor-widget-social-icons.e-grid-align-mobile-left .elementor-grid,.e--ua-appleWebkit .elementor-grid-0.elementor-widget-social-icons.e-grid-align-mobile-left .elementor-grid-item {
        margin-left: 0;
        margin-right: 0
    }
}

@media (max-width: 767px) {
    .elementor .elementor-hidden-mobile,.elementor .elementor-hidden-phone {
        display:none
    }
}

@media (min-width: -1) and (max-width:-1) {
    .elementor .elementor-hidden-mobile_extra {
        display:none
    }
}

@media (min-width: 768px) and (max-width:1024px) {
    .elementor .elementor-hidden-tablet {
        display:none
    }
}

@media (min-width: -1) and (max-width:-1) {
    .elementor .elementor-hidden-laptop,.elementor .elementor-hidden-tablet_extra {
        display:none
    }
}

@media (min-width: 1025px) and (max-width:99999px) {
    .elementor .elementor-hidden-desktop {
        display:none
    }
}

@media (min-width: -1) {
    .elementor .elementor-hidden-widescreen {
        display:none
    }
}

.elementor-widget-text-path {
    font-size: 20px;
    text-align: var(--alignment,left)
}

.elementor-widget-text-path svg {
    width: var(--width);
    max-width: 100%;
    height: auto;
    overflow: visible;
    word-spacing: var(--word-spacing);
    transform: rotate(var(--rotate,0)) scaleX(var(--scale-x,1)) scaleY(var(--scale-y,1))
}

.elementor-widget-text-path svg path {
    vector-effect: non-scaling-stroke;
    fill: var(--path-fill,transparent);
    stroke: var(--stroke-color,transparent);
    stroke-width: var(--stroke-width,1px);
    transition: var(--stroke-transition) stroke,var(--stroke-transition) fill
}

.elementor-widget-text-path svg:hover path {
    --path-fill: var(--path-fill-hover);
    --stroke-color: var(--stroke-color-hover);
    --stroke-width: var(--stroke-width-hover)
}

.elementor-widget-text-path svg text {
    --fill: var(--text-color);
    fill: var(--fill);
    direction: var(--direction,ltr);
    transition: var(--transition) stroke,var(--transition) stroke-width,var(--transition) fill
}

.elementor-widget-text-path svg text:hover {
    --color: var(--text-color-hover,var(--text-color));
    --fill: var(--color);
    color: var(--color)
}

.elementor-widget-n-tabs {
    --n-tabs-color-accent-fallback: #61ce70;
    --n-tabs-color-secondary-fallback: #54595f;
    --n-tabs-default-padding-block: 15px;
    --n-tabs-default-padding-inline: 35px;
    --n-tabs-overflow-x: hidden;
    --n-tabs-overflow-y: auto;
    --n-tabs-background-color: transparent;
    --n-tabs-display: flex;
    --n-tabs-direction: column;
    --n-tabs-gap: 10px;
    --n-tabs-heading-display: flex;
    --n-tabs-heading-direction: row;
    --n-tabs-heading-grow: initial;
    --n-tabs-heading-justify-content: center;
    --n-tabs-heading-width: initial;
    --n-tabs-height: initial;
    --n-tabs-border-width: 1px;
    --n-tabs-border-color: #d4d4d4;
    --n-tabs-content-padding: initial;
    --n-tabs-content-border-radius: initial;
    --n-tabs-title-color: var(--e-global-color-secondary,var(--n-tabs-color-secondary-fallback));
    --n-tabs-title-color-hover: #fff;
    --n-tabs-title-color-active: #fff;
    --n-tabs-title-background-color: #f1f3f5;
    --n-tabs-title-background-color-hover: var(--e-global-color-accent,var(--n-tabs-color-accent-fallback));
    --n-tabs-title-background-color-active: var(--e-global-color-accent,var(--n-tabs-color-accent-fallback));
    --n-tabs-title-width: initial;
    --n-tabs-title-height: initial;
    --n-tabs-title-font-size: 1rem;
    --n-tabs-title-justify-content-toggle: initial;
    --n-tabs-title-align-items-toggle: center;
    --n-tabs-title-justify-content: center;
    --n-tabs-title-align-items: center;
    --n-tabs-title-direction: row;
    --n-tabs-title-gap: 10px;
    --n-tabs-title-padding-top: var(--n-tabs-default-padding-block);
    --n-tabs-title-padding-right: var(--n-tabs-default-padding-inline);
    --n-tabs-title-padding-bottom: var(--n-tabs-default-padding-block);
    --n-tabs-title-padding-left: var(--n-tabs-default-padding-inline);
    --n-tabs-title-border-radius: initial;
    --n-tabs-title-transition: 0.3s;
    --n-tabs-icon-color: var(--e-global-color-secondary,var(--n-tabs-color-secondary-fallback));
    --n-tabs-icon-color-hover: var(--n-tabs-title-color-hover);
    --n-tabs-icon-color-active: #fff;
    --n-tabs-icon-gap: 5px;
    width: 100%;
    max-width: 100%
}

.elementor-widget-n-tabs .e-n-tabs {
    display: var(--n-tabs-display);
    flex-direction: var(--n-tabs-direction);
    gap: var(--n-tabs-gap);
    text-align: left;
    height: var(--n-tabs-height);
    overflow-x: var(--n-tabs-overflow-x);
    overflow-y: var(--n-tabs-overflow-y)
}

.elementor-widget-n-tabs .e-n-tabs-heading {
    display: var(--n-tabs-heading-display);
    flex-basis: var(--n-tabs-heading-width);
    flex-direction: var(--n-tabs-heading-direction);
    flex-shrink: 0;
    justify-content: var(--n-tabs-heading-justify-content);
    gap: var(--n-tabs-title-gap)
}

.elementor-widget-n-tabs .e-n-tabs-content {
    flex-grow: 1;
    padding: var(--n-tabs-content-padding);
    border-radius: var(--n-tabs-content-border-radius)
}

.elementor-widget-n-tabs .e-n-tab-title {
    display: flex;
    align-items: var(--n-tabs-title-align-items-toggle,var(--n-tabs-title-align-items));
    flex-direction: var(--n-tabs-title-direction);
    justify-content: var(--n-tabs-title-justify-content-toggle,var(--n-tabs-title-justify-content));
    gap: var(--n-tabs-icon-gap);
    border-width: var(--n-tabs-border-width);
    position: relative;
    cursor: pointer;
    outline: none;
    padding: var(--n-tabs-title-padding-top) var(--n-tabs-title-padding-right) var(--n-tabs-title-padding-bottom) var(--n-tabs-title-padding-left);
    border-radius: var(--n-tabs-title-border-radius);
    height: var(--n-tabs-title-height);
    width: var(--n-tabs-title-width);
    transition: background var(--n-tabs-title-transition),color var(--n-tabs-title-transition),border var(--n-tabs-title-transition),box-shadow var(--n-tabs-title-transition),text-shadow var(--n-tabs-title-transition),stroke var(--n-tabs-title-transition),stroke-width var(--n-tabs-title-transition),-webkit-text-stroke-width var(--n-tabs-title-transition),-webkit-text-stroke-color var(--n-tabs-title-transition),transform var(--n-tabs-title-transition)
}

.elementor-widget-n-tabs .e-n-tab-title span i,.elementor-widget-n-tabs .e-n-tab-title span svg {
    transition: color var(--n-tabs-title-transition),fill var(--n-tabs-title-transition)
}

.elementor-widget-n-tabs .e-n-tab-title-text {
    display: flex;
    align-items: center;
    font-size: var(--n-tabs-title-font-size)
}

.elementor-widget-n-tabs .e-n-tab-title .e-n-tab-icon {
    display: flex;
    align-items: center;
    flex-direction: column;
    order: var(--n-tabs-icon-order);
    overflow: hidden
}

.elementor-widget-n-tabs .e-n-tab-title .e-n-tab-icon i {
    font-size: var(--n-tabs-icon-size,var(--n-tabs-title-font-size))
}

.elementor-widget-n-tabs .e-n-tab-title .e-n-tab-icon svg {
    width: var(--n-tabs-icon-size,var(--n-tabs-title-font-size));
    height: var(--n-tabs-icon-size,var(--n-tabs-title-font-size))
}

.elementor-widget-n-tabs .e-n-tab-title .e-n-tab-icon:empty {
    display: none
}

.elementor-widget-n-tabs .e-n-tab-title:not(.e-active) {
    background-color: var(--n-tabs-title-background-color)
}

.elementor-widget-n-tabs .e-n-tab-title:not(.e-active),.elementor-widget-n-tabs .e-n-tab-title:not(.e-active) a {
    color: var(--n-tabs-title-color)
}

.elementor-widget-n-tabs .e-n-tab-title:not(.e-active) .e-n-tab-icon i {
    color: var(--n-tabs-icon-color)
}

.elementor-widget-n-tabs .e-n-tab-title:not(.e-active) .e-n-tab-icon svg {
    fill: var(--n-tabs-icon-color)
}

.elementor-widget-n-tabs .e-n-tab-title:not(.e-active) .e-n-tab-icon i:last-child,.elementor-widget-n-tabs .e-n-tab-title:not(.e-active) .e-n-tab-icon svg:last-child {
    transform: translateY(-100vh);
    height: 0;
    opacity: 0
}

.elementor-widget-n-tabs .e-n-tab-title:not(.e-active):hover,.elementor-widget-n-tabs .e-n-tab-title:not(.e-active):hover a {
    color: var(--n-tabs-title-color-hover)
}

.elementor-widget-n-tabs .e-n-tab-title:not(.e-active):hover .e-n-tab-icon i {
    color: var(--n-tabs-icon-color-hover)
}

.elementor-widget-n-tabs .e-n-tab-title:not(.e-active):hover .e-n-tab-icon svg {
    fill: var(--n-tabs-icon-color-hover)
}

.elementor-widget-n-tabs .e-n-tab-title.e-active,.elementor-widget-n-tabs .e-n-tab-title.e-active a {
    color: var(--n-tabs-title-color-active)
}

.elementor-widget-n-tabs .e-n-tab-title.e-active .e-n-tab-icon i {
    color: var(--n-tabs-icon-color-active)
}

.elementor-widget-n-tabs .e-n-tab-title.e-active .e-n-tab-icon svg {
    fill: var(--n-tabs-icon-color-active)
}

.elementor-widget-n-tabs .e-n-tab-title.e-active .e-n-tab-icon i:first-child,.elementor-widget-n-tabs .e-n-tab-title.e-active .e-n-tab-icon svg:first-child {
    transform: translateY(-100vh);
    height: 0;
    opacity: 0
}

.elementor-widget-n-tabs .e-n-tab-title.e-active[class*=elementor-animation-]:active,.elementor-widget-n-tabs .e-n-tab-title.e-active[class*=elementor-animation-]:focus,.elementor-widget-n-tabs .e-n-tab-title.e-active[class*=elementor-animation-]:hover {
    transform: none;
    animation: initial
}

.elementor-widget-n-tabs .e-con,.elementor-widget-n-tabs .e-n-tabs-content {
    border-width: 1px;
    border: var(--n-tabs-border-width) none var(--n-tabs-border-color)
}

.elementor-widget-n-tabs .e-con .e-collapse:not(:first-child),.elementor-widget-n-tabs .e-n-tabs-content .e-collapse:not(:first-child) {
    margin-top: var(--n-tabs-title-gap)
}

.elementor-widget-n-tabs .e-con .e-collapse.e-active,.elementor-widget-n-tabs .e-n-tabs-content .e-collapse.e-active {
    margin-bottom: var(--n-tabs-gap)
}

.elementor-widget-n-tabs .e-n-tabs-content>.e-con:not(.e-active) {
    display: none
}

:is(.elementor .elementor-element.elementor-widget-n-tabs>.elementor-widget-container>.e-n-tabs>.e-n-tabs-heading .e-n-tab-title,.elementor .elementor-element.elementor-widget-n-tabs>.elementor-widget-container>.e-n-tabs>.e-n-tabs-content .e-n-tab-title):hover {
    background-color: var(--n-tabs-title-background-color-hover);
    background-image: none
}

:is(.elementor .elementor-element.elementor-widget-n-tabs>.elementor-widget-container>.e-n-tabs>.e-n-tabs-heading .e-n-tab-title,.elementor .elementor-element.elementor-widget-n-tabs>.elementor-widget-container>.e-n-tabs>.e-n-tabs-content .e-n-tab-title).e-active {
    background-color: var(--n-tabs-title-background-color-active);
    background-image: none
}

@media (min-width: 768px) {
    .e-n-tabs-mobile>.elementor-widget-container>.e-n-tabs>.e-n-tabs-content>.e-collapse {
        display:none
    }
}

@media (max-width: 767px) {
    .e-n-tabs-mobile>.elementor-widget-container>.e-n-tabs>.e-n-tabs-heading {
        display:none
    }
}

@media (min-width: -1) {
    .e-n-tabs-mobile_extra>.elementor-widget-container>.e-n-tabs>.e-n-tabs-content>.e-collapse {
        display:none
    }
}

@media (max-width: -1) {
    .e-n-tabs-mobile_extra>.elementor-widget-container>.e-n-tabs>.e-n-tabs-heading {
        display:none
    }
}

@media (min-width: 1025px) {
    .e-n-tabs-tablet>.elementor-widget-container>.e-n-tabs>.e-n-tabs-content>.e-collapse {
        display:none
    }
}

@media (max-width: 1024px) {
    .e-n-tabs-tablet>.elementor-widget-container>.e-n-tabs>.e-n-tabs-heading {
        display:none
    }
}

@media (min-width: -1) {
    .e-n-tabs-tablet_extra>.elementor-widget-container>.e-n-tabs>.e-n-tabs-content>.e-collapse {
        display:none
    }
}

@media (max-width: -1) {
    .e-n-tabs-tablet_extra>.elementor-widget-container>.e-n-tabs>.e-n-tabs-heading {
        display:none
    }
}

@media (min-width: 1025px) {
    .e-n-tabs-laptop>.elementor-widget-container>.e-n-tabs>.e-n-tabs-content>.e-collapse {
        display:none
    }
}

@media (max-width: -1) {
    .e-n-tabs-laptop>.elementor-widget-container>.e-n-tabs>.e-n-tabs-heading {
        display:none
    }
}
.contact-section .form-box {
    position: relative;
    padding: 65px 70px 45px;
    background: #06202b;
    color: #ffffff;
}
.contact-section .content-box .image-layer {
    position: absolute;
    right: 0;
    top: 0;
    width: 420px;
    height: 100%;
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
}


.page-banner{
	position:relative;
	color:#ffffff;
	text-align:center;
	padding:180px 0px 80px;
	background-color:#25283a;
	z-index: 2;
}

.page-banner .image-layer{
	position:absolute;
	left:0px;
	top:0;
	width:100%;
	height:100%;
	background-position:center center;
	background-repeat:no-repeat;
	background-size:cover;	
}

.page-banner .image-layer:before{
	content:'';
	position:absolute;
	left:0;
	top:0;
	width:100%;
	height:100%;
	background:#000000;
	opacity:0.45;	
}

.page-banner .auto-container{
	position:relative;
	z-index:1;	
}

.page-banner h1{
	position:relative;
	font-size:72px;
	line-height:1.2em;
	font-weight:700;
	margin-bottom:15px;
	color:#ffffff;
	text-transform:capitalize;
	text-align:left;
}

.page-banner .breadcrumb-box{
	position: relative;
	left: 0;
	bottom: 0;
	width: 100%;
	text-align: left;
	margin: 0 0 20px;
}

.page-banner .bread-crumb{
	position:relative;
	display: inline-block;
}

.page-banner .bread-crumb li{
	position:relative;
	display:inline-block;
	line-height:30px;
	margin-left:10px;
	color:#ffffff;
	text-transform: capitalize;
	letter-spacing: 0.02em;
	font-size:16px;
	font-weight:500;
}

.page-banner .bread-crumb li:before{
	 /* font-family: 'Flaticon'; */
	content:'\f196';
	position:fixed;
	right:-40px;
	width: 40px;
	top:0px;
	text-align:center;
	line-height:25px;
	font-size: 16px;
	font-weight: 700;
}

.page-banner .bread-crumb li:first-child{
	margin-left:0px;	
}

.page-banner .bread-crumb li:last-child:before{
	display:none;	
}

.page-banner .bread-crumb li a{
	position: relative;
	color:#ffffff;
	display: block;
	line-height:30px;
	transition:all 0.3s ease;
	-moz-transition:all 0.3s ease;
	-webkit-transition:all 0.3s ease;
	-ms-transition:all 0.3s ease;
	-o-transition:all 0.3s ease;
}

.page-banner .bread-crumb li a:hover{
	text-decoration: underline;
}

.elementor-574 .elementor-element.elementor-element-d22f189 {
    padding: 100px 0px 80px 0px;
}

.elementor-574 .elementor-element.elementor-element-108e9fe .elementor-icon-wrapper {
    text-align: center;
}

.elementor-574 .elementor-element.elementor-element-108e9fe.elementor-view-stacked .elementor-icon {
    background-color: #00b7c5;
}

.elementor-574 .elementor-element.elementor-element-108e9fe.elementor-view-framed .elementor-icon, .elementor-574 .elementor-element.elementor-element-108e9fe.elementor-view-default .elementor-icon {
    color: #00b7c5;
    border-color: #00b7c5;
}

.elementor-574 .elementor-element.elementor-element-108e9fe.elementor-view-framed .elementor-icon, .elementor-574 .elementor-element.elementor-element-108e9fe.elementor-view-default .elementor-icon svg {
    fill: #00b7c5;
}

.elementor-574 .elementor-element.elementor-element-108e9fe .elementor-icon {
    font-size: 74px;
}

.elementor-574 .elementor-element.elementor-element-436ca38 {
    text-align: center;
    color: #020202;
}

.elementor-574 .elementor-element.elementor-element-d08a706 .elementor-icon-wrapper {
    text-align: center;
}

.elementor-574 .elementor-element.elementor-element-d08a706.elementor-view-stacked .elementor-icon {
    background-color: #00b7c5;
}

.elementor-574 .elementor-element.elementor-element-d08a706.elementor-view-framed .elementor-icon, .elementor-574 .elementor-element.elementor-element-d08a706.elementor-view-default .elementor-icon {
    color: #00b7c5;
    border-color: #00b7c5;
}

.elementor-574 .elementor-element.elementor-element-d08a706.elementor-view-framed .elementor-icon, .elementor-574 .elementor-element.elementor-element-d08a706.elementor-view-default .elementor-icon svg {
    fill: #00b7c5;
}

.elementor-574 .elementor-element.elementor-element-d08a706 .elementor-icon {
    font-size: 74px;
}

.elementor-574 .elementor-element.elementor-element-3ac5c9c {
    text-align: center;
    color: #020202;
}

.elementor-574 .elementor-element.elementor-element-2d10c87 .elementor-icon-wrapper {
    text-align: center;
}

.elementor-574 .elementor-element.elementor-element-2d10c87.elementor-view-stacked .elementor-icon {
    background-color: #00b7c5;
}

.elementor-574 .elementor-element.elementor-element-2d10c87.elementor-view-framed .elementor-icon, .elementor-574 .elementor-element.elementor-element-2d10c87.elementor-view-default .elementor-icon {
    color: #00b7c5;
    border-color: #00b7c5;
}

.elementor-574 .elementor-element.elementor-element-2d10c87.elementor-view-framed .elementor-icon, .elementor-574 .elementor-element.elementor-element-2d10c87.elementor-view-default .elementor-icon svg {
    fill: #00b7c5;
}

.elementor-574 .elementor-element.elementor-element-2d10c87 .elementor-icon {
    font-size: 74px;
}

.elementor-574 .elementor-element.elementor-element-79f4c0c {
    text-align: center;
    color: #020202;
}

.elementor-574 .elementor-element.elementor-element-6c8c08e .contact-info-section3 .contact-info-block .inner-box {
    display: show !important;
}

.elementor-574 .elementor-element.elementor-element-6c8c08e .contact-info-section3 .contact-info-block h5 {
    display: show !important;
}

.elementor-574 .elementor-element.elementor-element-6c8c08e .contact-info-section3 .contact-info-block .icon-box {
    display: show !important;
    text-align: center !important;
}

.elementor-574 .elementor-element.elementor-element-6c8c08e .contact-info-section3 .contact-info-block h4 {
    display: show !important;
    text-align: center !important;
}

.elementor-574 .elementor-element.elementor-element-6c8c08e .contact-info-section3 .contact-info-block .text {
    display: show !important;
    text-align: center !important;
}

.elementor-574 .elementor-element.elementor-element-6c8c08e .contact-info-section3 .contact-info-block ul li {
    display: show !important;
    text-align: center !important;
}

.elementor-574 .elementor-element.elementor-element-14fb5e83:not(.elementor-motion-effects-element-type-background), .elementor-574 .elementor-element.elementor-element-14fb5e83 > .elementor-motion-effects-container > .elementor-motion-effects-layer {
    background-image: url("http://alcleanscarpet.site/bokeonelectric/wp-content/uploads/2020/10/mainslide-03-1.jpg");
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
}

.elementor-574 .elementor-element.elementor-element-14fb5e83 {
    transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
    margin-top: 0px;
    margin-bottom: 0px;
    padding: 0px 0px 0px 0px;
}

.elementor-574 .elementor-element.elementor-element-14fb5e83 > .elementor-background-overlay {
    transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
}

.elementor-574 .elementor-element.elementor-element-715de87d .two.contact-section.contact-page .sec-title h2 {
    display: show !important;
    text-align: center !important;
}

.elementor-574 .elementor-element.elementor-element-715de87d .contact-section .form-box .form-group input, .contact-section .form-box .form-group textarea {
    display: show !important;
}




.elementor-574 .elementor-element.elementor-element-715de87d .contact-section .form-box .form-group {
    text-align: center !important;
}

.elementor-574 .elementor-element.elementor-element-715de87d .contact-section .info-box .subtitle {
    display: show !important;
    text-align: center !important;
}

.elementor-574 .elementor-element.elementor-element-715de87d .contact-section .info-box .phone {
    display: show !important;
    text-align: center !important;
}

   
@media only screen and (max-width: 767px) {

.contact-section .content-box .image-layer {
    position: relative;
    width: 100%;
    padding: 50px 20px;
}

.contact-section .content-box {
    padding: 0;
}

.contact-section .form-box {
    padding: 40px 20px 20px;
}

.contact-section .info-box {
    position: relative;
    left: 0;
    top: 0;
    bottom: 0;
    right: 0;
    margin: 0;
    padding: 30px 20px;
    text-align: center;

}
}

</style>

<section class="page-banner">
    <div class="image-layer"
        style="background-image: url(http://july.commonsupport.com/electman/wp-content/uploads/2020/08/banner-bg-8-1.jpg);">
    </div>
    <div class="auto-container">
        <h1>Contact</h1>
        <div class="breadcrumb-box">
            <div class="auto-container">
                <ul class="bread-crumb clearfix">
                    <li class="breadcrumb-item"><a href="http://alcleanscarpet.site/bokeonelectric/">Home &nbsp;</a>
                    </li>
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>

                    <li class="breadcrumb-item">Contact</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div data-elementor-type="wp-page" data-elementor-id="574" class="elementor elementor-574">
    <section class="elementor-section elementor-top-section elementor-element elementor-element-d22f189 elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default"
        data-id="d22f189" data-element_type="section"
        data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
        <div class="elementor-container elementor-column-gap-no">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-cc7415e"
                data-id="cc7415e" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <section
                        class="elementor-section elementor-inner-section elementor-element elementor-element-dbadaa5 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="dbadaa5" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-b8c3e30"
                                data-id="b8c3e30" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-108e9fe elementor-view-default elementor-widget elementor-widget-icon"
                                        data-id="108e9fe" data-element_type="widget"
                                        data-widget_type="icon.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-icon-wrapper">
                                                <div class="elementor-icon">
                                                    <i aria-hidden="true" class="fas fa-map-marked-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-436ca38 elementor-widget elementor-widget-text-editor"
                                        data-id="436ca38" data-element_type="widget"
                                        data-widget_type="text-editor.default">
                                        <div class="elementor-widget-container">
                                            <style>
                                                /*! elementor - v3.11.5 - 14-03-2023 */
                                                .elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap {
                                                    background-color: #818a91;
                                                    color: #fff
                                                }

                                                .elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap {
                                                    color: #818a91;
                                                    border: 3px solid;
                                                    background-color: transparent
                                                }

                                                .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap {
                                                    margin-top: 8px
                                                }

                                                .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter {
                                                    width: 1em;
                                                    height: 1em
                                                }

                                                .elementor-widget-text-editor .elementor-drop-cap {
                                                    float: left;
                                                    text-align: center;
                                                    line-height: 1;
                                                    font-size: 50px
                                                }

                                                .elementor-widget-text-editor .elementor-drop-cap-letter {
                                                    display: inline-block
                                                }

                                            </style>
                                            <h3><strong>Visit Our Place</strong></h3>
                                            <p> <br />402 Court Street<br />Plymouth, MA 02360<br />USA</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-0b1a1b4"
                                data-id="0b1a1b4" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-d08a706 elementor-view-default elementor-widget elementor-widget-icon"
                                        data-id="d08a706" data-element_type="widget"
                                        data-widget_type="icon.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-icon-wrapper">
                                                <div class="elementor-icon">
                                                    <i aria-hidden="true" class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-3ac5c9c elementor-widget elementor-widget-text-editor"
                                        data-id="3ac5c9c" data-element_type="widget"
                                        data-widget_type="text-editor.default">
                                        <div class="elementor-widget-container">
                                            <h3><strong>Quick Contact</strong></h3>
                                            <p> <br /><br />Phone: (508) 830-9471<br /><br />Email:</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-3139eb7"
                                data-id="3139eb7" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-2d10c87 elementor-view-default elementor-widget elementor-widget-icon"
                                        data-id="2d10c87" data-element_type="widget"
                                        data-widget_type="icon.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-icon-wrapper">
                                                <div class="elementor-icon">
                                                    <i aria-hidden="true" class="fas fa-location-arrow"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-79f4c0c elementor-widget elementor-widget-text-editor"
                                        data-id="79f4c0c" data-element_type="widget"
                                        data-widget_type="text-editor.default">
                                        <div class="elementor-widget-container">
                                            <h3><strong>Visit Between</strong></h3>
                                            <p> </p>
                                            <ul>
                                                <li>Mon &#8211; Saturday: 9.00am to 6.00pm <br /><br /></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="elementor-element elementor-element-6c8c08e elementor-hidden-desktop elementor-hidden-tablet elementor-hidden-mobile elementor-widget elementor-widget-electman_contact_info3"
                        data-id="6c8c08e" data-element_type="widget"
                        data-widget_type="electman_contact_info3.default">
                        <div class="elementor-widget-container">

                            <!-- Contact Info -->
                          

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="elementor-section elementor-top-section elementor-element elementor-element-14fb5e83 elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default"
        data-id="14fb5e83" data-element_type="section"
        data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
        <div class="elementor-container elementor-column-gap-no">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-50cd86aa"
                data-id="50cd86aa" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-715de87d elementor-widget elementor-widget-electman_contact_form"
                        data-id="715de87d" data-element_type="widget"
                        data-widget_type="electman_contact_form.default">
                        <div class="elementor-widget-container">

                            <!--Contact Section-->
                           <section class="two contact-section contact-page">
			<div class="auto-container">
				<div class="content-box clearfix wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="2000ms" 
                style="visibility: visible; animation-duration: 2000ms; animation-delay: 0ms; animation-name: fadeInUp;">
					<div class="form-box clearfix">
						<div class="sec-title light-title">
							<h2>Don’t Hesitate To <br>Contact Us</h2>
							
						</div>

                        	<div class="default-form contact-form">
							
<div class="wpcf7 js" id="wpcf7-f582-p574-o1" lang="en-US" dir="ltr">
<div class="screen-reader-response"><p role="status" aria-live="polite" aria-atomic="true"></p> <ul></ul></div>
<form id="crudFormFix" action="<?php echo base_url();?>front/add_contact/add" method="post" 
class="wpcf7-form init" aria-label="Contact form" novalidate="novalidate" data-status="init">

<div class="row clearfix">
	<div class="col-lg-6 col-md-6 col-sm-12 form-group">
		<p><span class="wpcf7-form-control-wrap" data-name="your-name">
            <input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
             aria-required="true" aria-invalid="false" placeholder="Your Name" value="" type="text" name="name"></span>
		</p>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-12 form-group">
		<p><span class="wpcf7-form-control-wrap" data-name="email-780">
            <input size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" 
            aria-required="true" aria-invalid="false" placeholder="Email" value="" type="email" name="email"></span>
		</p>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 form-group">
		<p><span class="wpcf7-form-control-wrap"
         data-name="text-815">
         <input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" 
         aria-required="true" aria-invalid="false" placeholder="phone" value="" type="number" name="phone"></span>
		</p>
	</div>
	<div class="col-md-12 col-sm-12 form-group">
		<p><span class="wpcf7-form-control-wrap" data-name="textarea-641">
            <textarea cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" 
            aria-required="true" aria-invalid="false" placeholder="Message" name="message"></textarea></span>
		</p>
	</div>
    <div class="col-12">
                             <button class="btn btn-outline-warning pl-5 pr-5 " type="submit">Submit </button>
                          </div>
</div>
<!-- <div class="wpcf7-response-output" aria-hidden="true"></div> -->
</form>
</div>
						</div>
					</div>
										<div class="image-layer" style="background-image: url(http://alcleanscarpet.site/bokeonelectric/wp-content/uploads/2020/10/Screenshot_2-1.png);">
											<div class="info-box">
							<div class="subtitle">Call Us 24/7 For Support</div>
							<div class="phone">
								<span class="icon">
									<img decoding="async" src="images/icons/icon-call-1.png" alt="">
								</span>
								<a href="#">(508) 830-9471</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<div class="clearfix"></div>





<!--Search Popup-->

