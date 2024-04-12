<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Añado meta para axios --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    {{-- añadidos tamplate --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    {{-- fin añadidos template --}}

    <!-- Styles -->
    {{-- @vite('resources/css/app.css', 'resources/js/refreshSelectUserType.js', 'resources/js/userDropdownMenu.js') --}}
    @vite(['resources/css/app.css'])
    {{-- @vite(['resources/js/refreshSelectUserType.js'])
@vite(['resources/js/userDropdownMenu.js']) --}}
    @vite(['resources/js/app.js'])
    {{-- @vite(['resources\js\vueJs\notificationMenu.js']) --}}
    @vite(['resources/js/vueJs/notificationMenu.js'])

    @yield('css')

    @yield('js')

    <title>@yield('title')</title>

    <title>Panel Administrador</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap');

/*
! tailwindcss v3.3.3 | MIT License | https://tailwindcss.com
*/

/*
1. Prevent padding and border from affecting element width. (https://github.com/mozdevs/cssremedy/issues/4)
2. Allow adding a border to an element by just adding a border-width. (https://github.com/tailwindcss/tailwindcss/pull/116)
*/

*,
::before,
::after {
  box-sizing: border-box;
  /* 1 */
  border-width: 0;
  /* 2 */
  border-style: solid;
  /* 2 */
  border-color: #e5e7eb;
  /* 2 */
}

::before,
::after {
  --tw-content: '';
}

/*
1. Use a consistent sensible line-height in all browsers.
2. Prevent adjustments of font size after orientation changes in iOS.
3. Use a more readable tab size.
4. Use the user's configured `sans` font-family by default.
5. Use the user's configured `sans` font-feature-settings by default.
6. Use the user's configured `sans` font-variation-settings by default.
*/

html {
  line-height: 1.5;
  /* 1 */
  -webkit-text-size-adjust: 100%;
  /* 2 */
  -moz-tab-size: 4;
  /* 3 */
  -o-tab-size: 4;
     tab-size: 4;
  /* 3 */
  font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  /* 4 */
  font-feature-settings: normal;
  /* 5 */
  font-variation-settings: normal;
  /* 6 */
}

/*
1. Remove the margin in all browsers.
2. Inherit line-height from `html` so users can set them as a class directly on the `html` element.
*/

body {
  margin: 0;
  /* 1 */
  line-height: inherit;
  /* 2 */
}

/*
1. Add the correct height in Firefox.
2. Correct the inheritance of border color in Firefox. (https://bugzilla.mozilla.org/show_bug.cgi?id=190655)
3. Ensure horizontal rules are visible by default.
*/

hr {
  height: 0;
  /* 1 */
  color: inherit;
  /* 2 */
  border-top-width: 1px;
  /* 3 */
}

/*
Add the correct text decoration in Chrome, Edge, and Safari.
*/

abbr:where([title]) {
  -webkit-text-decoration: underline dotted;
          text-decoration: underline dotted;
}

/*
Remove the default font size and weight for headings.
*/

h1,
h2,
h3,
h4,
h5,
h6 {
  font-size: inherit;
  font-weight: inherit;
}

/*
Reset links to optimize for opt-in styling instead of opt-out.
*/

a {
  color: inherit;
  text-decoration: inherit;
}

/*
Add the correct font weight in Edge and Safari.
*/

b,
strong {
  font-weight: bolder;
}

/*
1. Use the user's configured `mono` font family by default.
2. Correct the odd `em` font sizing in all browsers.
*/

code,
kbd,
samp,
pre {
  font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
  /* 1 */
  font-size: 1em;
  /* 2 */
}

/*
Add the correct font size in all browsers.
*/

small {
  font-size: 80%;
}

/*
Prevent `sub` and `sup` elements from affecting the line height in all browsers.
*/

sub,
sup {
  font-size: 75%;
  line-height: 0;
  position: relative;
  vertical-align: baseline;
}

sub {
  bottom: -0.25em;
}

sup {
  top: -0.5em;
}

/*
1. Remove text indentation from table contents in Chrome and Safari. (https://bugs.chromium.org/p/chromium/issues/detail?id=999088, https://bugs.webkit.org/show_bug.cgi?id=201297)
2. Correct table border color inheritance in all Chrome and Safari. (https://bugs.chromium.org/p/chromium/issues/detail?id=935729, https://bugs.webkit.org/show_bug.cgi?id=195016)
3. Remove gaps between table borders by default.
*/

table {
  text-indent: 0;
  /* 1 */
  border-color: inherit;
  /* 2 */
  border-collapse: collapse;
  /* 3 */
}

/*
1. Change the font styles in all browsers.
2. Remove the margin in Firefox and Safari.
3. Remove default padding in all browsers.
*/

button,
input,
optgroup,
select,
textarea {
  font-family: inherit;
  /* 1 */
  font-feature-settings: inherit;
  /* 1 */
  font-variation-settings: inherit;
  /* 1 */
  font-size: 100%;
  /* 1 */
  font-weight: inherit;
  /* 1 */
  line-height: inherit;
  /* 1 */
  color: inherit;
  /* 1 */
  margin: 0;
  /* 2 */
  padding: 0;
  /* 3 */
}

/*
Remove the inheritance of text transform in Edge and Firefox.
*/

button,
select {
  text-transform: none;
}

/*
1. Correct the inability to style clickable types in iOS and Safari.
2. Remove default button styles.
*/

button,
[type='button'],
[type='reset'],
[type='submit'] {
  -webkit-appearance: button;
  /* 1 */
  background-color: transparent;
  /* 2 */
  background-image: none;
  /* 2 */
}

/*
Use the modern Firefox focus style for all focusable elements.
*/

:-moz-focusring {
  outline: auto;
}

/*
Remove the additional `:invalid` styles in Firefox. (https://github.com/mozilla/gecko-dev/blob/2f9eacd9d3d995c937b4251a5557d95d494c9be1/layout/style/res/forms.css#L728-L737)
*/

:-moz-ui-invalid {
  box-shadow: none;
}

/*
Add the correct vertical alignment in Chrome and Firefox.
*/

progress {
  vertical-align: baseline;
}

/*
Correct the cursor style of increment and decrement buttons in Safari.
*/

::-webkit-inner-spin-button,
::-webkit-outer-spin-button {
  height: auto;
}

/*
1. Correct the odd appearance in Chrome and Safari.
2. Correct the outline style in Safari.
*/

[type='search'] {
  -webkit-appearance: textfield;
  /* 1 */
  outline-offset: -2px;
  /* 2 */
}

/*
Remove the inner padding in Chrome and Safari on macOS.
*/

::-webkit-search-decoration {
  -webkit-appearance: none;
}

/*
1. Correct the inability to style clickable types in iOS and Safari.
2. Change font properties to `inherit` in Safari.
*/

::-webkit-file-upload-button {
  -webkit-appearance: button;
  /* 1 */
  font: inherit;
  /* 2 */
}

/*
Add the correct display in Chrome and Safari.
*/

summary {
  display: list-item;
}

/*
Removes the default spacing and border for appropriate elements.
*/

blockquote,
dl,
dd,
h1,
h2,
h3,
h4,
h5,
h6,
hr,
figure,
p,
pre {
  margin: 0;
}

fieldset {
  margin: 0;
  padding: 0;
}

legend {
  padding: 0;
}

ol,
ul,
menu {
  list-style: none;
  margin: 0;
  padding: 0;
}

/*
Reset default styling for dialogs.
*/

dialog {
  padding: 0;
}

/*
Prevent resizing textareas horizontally by default.
*/

textarea {
  resize: vertical;
}

/*
1. Reset the default placeholder opacity in Firefox. (https://github.com/tailwindlabs/tailwindcss/issues/3300)
2. Set the default placeholder color to the user's configured gray 400 color.
*/

input::-moz-placeholder, textarea::-moz-placeholder {
  opacity: 1;
  /* 1 */
  color: #9ca3af;
  /* 2 */
}

input::placeholder,
textarea::placeholder {
  opacity: 1;
  /* 1 */
  color: #9ca3af;
  /* 2 */
}

/*
Set the default cursor for buttons.
*/

button,
[role="button"] {
  cursor: pointer;
}

/*
Make sure disabled buttons don't get the pointer cursor.
*/

:disabled {
  cursor: default;
}

/*
1. Make replaced elements `display: block` by default. (https://github.com/mozdevs/cssremedy/issues/14)
2. Add `vertical-align: middle` to align replaced elements more sensibly by default. (https://github.com/jensimmons/cssremedy/issues/14#issuecomment-634934210)
   This can trigger a poorly considered lint error in some tools but is included by design.
*/

img,
svg,
video,
canvas,
audio,
iframe,
embed,
object {
  display: block;
  /* 1 */
  vertical-align: middle;
  /* 2 */
}

/*
Constrain images and videos to the parent width and preserve their intrinsic aspect ratio. (https://github.com/mozdevs/cssremedy/issues/14)
*/

img,
video {
  max-width: 100%;
  height: auto;
}

/* Make elements with the HTML hidden attribute stay hidden by default */

[hidden] {
  display: none;
}

*, ::before, ::after{
  --tw-border-spacing-x: 0;
  --tw-border-spacing-y: 0;
  --tw-translate-x: 0;
  --tw-translate-y: 0;
  --tw-rotate: 0;
  --tw-skew-x: 0;
  --tw-skew-y: 0;
  --tw-scale-x: 1;
  --tw-scale-y: 1;
  --tw-pan-x:  ;
  --tw-pan-y:  ;
  --tw-pinch-zoom:  ;
  --tw-scroll-snap-strictness: proximity;
  --tw-gradient-from-position:  ;
  --tw-gradient-via-position:  ;
  --tw-gradient-to-position:  ;
  --tw-ordinal:  ;
  --tw-slashed-zero:  ;
  --tw-numeric-figure:  ;
  --tw-numeric-spacing:  ;
  --tw-numeric-fraction:  ;
  --tw-ring-inset:  ;
  --tw-ring-offset-width: 0px;
  --tw-ring-offset-color: #fff;
  --tw-ring-color: rgb(59 130 246 / 0.5);
  --tw-ring-offset-shadow: 0 0 #0000;
  --tw-ring-shadow: 0 0 #0000;
  --tw-shadow: 0 0 #0000;
  --tw-shadow-colored: 0 0 #0000;
  --tw-blur:  ;
  --tw-brightness:  ;
  --tw-contrast:  ;
  --tw-grayscale:  ;
  --tw-hue-rotate:  ;
  --tw-invert:  ;
  --tw-saturate:  ;
  --tw-sepia:  ;
  --tw-drop-shadow:  ;
  --tw-backdrop-blur:  ;
  --tw-backdrop-brightness:  ;
  --tw-backdrop-contrast:  ;
  --tw-backdrop-grayscale:  ;
  --tw-backdrop-hue-rotate:  ;
  --tw-backdrop-invert:  ;
  --tw-backdrop-opacity:  ;
  --tw-backdrop-saturate:  ;
  --tw-backdrop-sepia:  ;
}

::backdrop{
  --tw-border-spacing-x: 0;
  --tw-border-spacing-y: 0;
  --tw-translate-x: 0;
  --tw-translate-y: 0;
  --tw-rotate: 0;
  --tw-skew-x: 0;
  --tw-skew-y: 0;
  --tw-scale-x: 1;
  --tw-scale-y: 1;
  --tw-pan-x:  ;
  --tw-pan-y:  ;
  --tw-pinch-zoom:  ;
  --tw-scroll-snap-strictness: proximity;
  --tw-gradient-from-position:  ;
  --tw-gradient-via-position:  ;
  --tw-gradient-to-position:  ;
  --tw-ordinal:  ;
  --tw-slashed-zero:  ;
  --tw-numeric-figure:  ;
  --tw-numeric-spacing:  ;
  --tw-numeric-fraction:  ;
  --tw-ring-inset:  ;
  --tw-ring-offset-width: 0px;
  --tw-ring-offset-color: #fff;
  --tw-ring-color: rgb(59 130 246 / 0.5);
  --tw-ring-offset-shadow: 0 0 #0000;
  --tw-ring-shadow: 0 0 #0000;
  --tw-shadow: 0 0 #0000;
  --tw-shadow-colored: 0 0 #0000;
  --tw-blur:  ;
  --tw-brightness:  ;
  --tw-contrast:  ;
  --tw-grayscale:  ;
  --tw-hue-rotate:  ;
  --tw-invert:  ;
  --tw-saturate:  ;
  --tw-sepia:  ;
  --tw-drop-shadow:  ;
  --tw-backdrop-blur:  ;
  --tw-backdrop-brightness:  ;
  --tw-backdrop-contrast:  ;
  --tw-backdrop-grayscale:  ;
  --tw-backdrop-hue-rotate:  ;
  --tw-backdrop-invert:  ;
  --tw-backdrop-opacity:  ;
  --tw-backdrop-saturate:  ;
  --tw-backdrop-sepia:  ;
}

.fixed{
  position: fixed;
}

.absolute{
  position: absolute;
}

.relative{
  position: relative;
}

.sticky{
  position: sticky;
}

.left-0{
  left: 0px;
}

.left-4{
  left: 1rem;
}

.top-0{
  top: 0px;
}

.top-1\/2{
  top: 50%;
}

.z-30{
  z-index: 30;
}

.z-40{
  z-index: 40;
}

.z-50{
  z-index: 50;
}

.my-2{
  margin-top: 0.5rem;
  margin-bottom: 0.5rem;
}

.-ml-3{
  margin-left: -0.75rem;
}

.mb-0{
  margin-bottom: 0px;
}

.mb-0\.5{
  margin-bottom: 0.125rem;
}

.mb-1{
  margin-bottom: 0.25rem;
}

.mb-2{
  margin-bottom: 0.5rem;
}

.mb-4{
  margin-bottom: 1rem;
}

.mb-6{
  margin-bottom: 1.5rem;
}

.ml-1{
  margin-left: 0.25rem;
}

.ml-2{
  margin-left: 0.5rem;
}

.ml-3{
  margin-left: 0.75rem;
}

.ml-4{
  margin-left: 1rem;
}

.ml-auto{
  margin-left: auto;
}

.mr-1{
  margin-right: 0.25rem;
}

.mr-2{
  margin-right: 0.5rem;
}

.mr-3{
  margin-right: 0.75rem;
}

.mr-4{
  margin-right: 1rem;
}

.mt-2{
  margin-top: 0.5rem;
}

.mt-3{
  margin-top: 0.75rem;
}

.mt-4{
  margin-top: 1rem;
}

.block{
  display: block;
}

.inline-block{
  display: inline-block;
}

.flex{
  display: flex;
}

.table{
  display: table;
}

.grid{
  display: grid;
}

.hidden{
  display: none;
}

.h-2{
  height: 0.5rem;
}

.h-4{
  height: 1rem;
}

.h-6{
  height: 1.5rem;
}

.h-8{
  height: 2rem;
}

.h-full{
  height: 100%;
}

.max-h-64{
  max-height: 16rem;
}

.min-h-screen{
  min-height: 100vh;
}

.w-2{
  width: 0.5rem;
}

.w-6{
  width: 1.5rem;
}

.w-64{
  width: 16rem;
}

.w-8{
  width: 2rem;
}

.w-full{
  width: 100%;
}

.min-w-\[460px\]{
  min-width: 460px;
}

.min-w-\[540px\]{
  min-width: 540px;
}

.max-w-\[140px\]{
  max-width: 140px;
}

.max-w-xs{
  max-width: 20rem;
}

.-translate-x-full{
  --tw-translate-x: -100%;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}

.-translate-y-1\/2{
  --tw-translate-y: -50%;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}

.appearance-none{
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
}

.grid-cols-1{
  grid-template-columns: repeat(1, minmax(0, 1fr));
}

.items-start{
  align-items: flex-start;
}

.items-center{
  align-items: center;
}

.justify-center{
  justify-content: center;
}

.justify-between{
  justify-content: space-between;
}

.gap-4{
  gap: 1rem;
}

.gap-6{
  gap: 1.5rem;
}

.overflow-x-auto{
  overflow-x: auto;
}

.overflow-y-auto{
  overflow-y: auto;
}

.truncate{
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}

.rounded{
  border-radius: 0.25rem;
}

.rounded-full{
  border-radius: 9999px;
}

.rounded-md{
  border-radius: 0.375rem;
}

.rounded-bl-md{
  border-bottom-left-radius: 0.375rem;
}

.rounded-br-md{
  border-bottom-right-radius: 0.375rem;
}

.rounded-tl-md{
  border-top-left-radius: 0.375rem;
}

.rounded-tr-md{
  border-top-right-radius: 0.375rem;
}

.border{
  border-width: 1px;
}

.border-b{
  border-bottom-width: 1px;
}

.border-b-2{
  border-bottom-width: 2px;
}

.border-dashed{
  border-style: dashed;
}

.border-gray-100{
  --tw-border-opacity: 1;
  border-color: rgb(243 244 246 / var(--tw-border-opacity));
}

.border-gray-200{
  --tw-border-opacity: 1;
  border-color: rgb(229 231 235 / var(--tw-border-opacity));
}

.border-b-gray-100{
  --tw-border-opacity: 1;
  border-bottom-color: rgb(243 244 246 / var(--tw-border-opacity));
}

.border-b-gray-50{
  --tw-border-opacity: 1;
  border-bottom-color: rgb(249 250 251 / var(--tw-border-opacity));
}

.border-b-gray-800{
  --tw-border-opacity: 1;
  border-bottom-color: rgb(31 41 55 / var(--tw-border-opacity));
}

.border-b-transparent{
  border-bottom-color: transparent;
}

.bg-black\/50{
  background-color: rgb(0 0 0 / 0.5);
}

.bg-blue-500{
  --tw-bg-opacity: 1;
  background-color: rgb(59 130 246 / var(--tw-bg-opacity));
}

.bg-blue-500\/10{
  background-color: rgb(59 130 246 / 0.1);
}

.bg-emerald-500\/10{
  background-color: rgb(16 185 129 / 0.1);
}

.bg-gray-100{
  --tw-bg-opacity: 1;
  background-color: rgb(243 244 246 / var(--tw-bg-opacity));
}

.bg-gray-50{
  --tw-bg-opacity: 1;
  background-color: rgb(249 250 251 / var(--tw-bg-opacity));
}

.bg-gray-900{
  --tw-bg-opacity: 1;
  background-color: rgb(17 24 39 / var(--tw-bg-opacity));
}

.bg-rose-500\/10{
  background-color: rgb(244 63 94 / 0.1);
}

.bg-white{
  --tw-bg-opacity: 1;
  background-color: rgb(255 255 255 / var(--tw-bg-opacity));
}

.bg-select-arrow{
  background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCI+PHBhdGggZD0iTTExLjk5OTcgMTMuMTcxNEwxNi45NDk1IDguMjIxNjhMMTguMzYzNyA5LjYzNTg5TDExLjk5OTcgMTUuOTk5OUw1LjYzNTc0IDkuNjM1ODlMNy4wNDk5NiA4LjIyMTY4TDExLjk5OTcgMTMuMTcxNFoiIGZpbGw9InJnYmEoMTU2LDE2MywxNzUsMSkiPjwvcGF0aD48L3N2Zz4=");
}

.bg-\[length\:16px_16px\]{
  background-size: 16px 16px;
}

.bg-\[right_16px_center\]{
  background-position: right 16px center;
}

.bg-no-repeat{
  background-repeat: no-repeat;
}

.object-cover{
  -o-object-fit: cover;
     object-fit: cover;
}

.p-1{
  padding: 0.25rem;
}

.p-4{
  padding: 1rem;
}

.p-6{
  padding: 1.5rem;
}

.px-4{
  padding-left: 1rem;
  padding-right: 1rem;
}

.px-6{
  padding-left: 1.5rem;
  padding-right: 1.5rem;
}

.py-1{
  padding-top: 0.25rem;
  padding-bottom: 0.25rem;
}

.py-1\.5{
  padding-top: 0.375rem;
  padding-bottom: 0.375rem;
}

.py-2{
  padding-top: 0.5rem;
  padding-bottom: 0.5rem;
}

.pb-1{
  padding-bottom: 0.25rem;
}

.pb-4{
  padding-bottom: 1rem;
}

.pl-10{
  padding-left: 2.5rem;
}

.pl-4{
  padding-left: 1rem;
}

.pl-7{
  padding-left: 1.75rem;
}

.pr-10{
  padding-right: 2.5rem;
}

.pr-4{
  padding-right: 1rem;
}

.pt-4{
  padding-top: 1rem;
}

.text-left{
  text-align: left;
}

.align-top{
  vertical-align: top;
}

.align-middle{
  vertical-align: middle;
}

.font-inter{
  font-family: 'Inter', sans-serif;
}

.text-2xl{
  font-size: 1.5rem;
  line-height: 2rem;
}

.text-\[11px\]{
  font-size: 11px;
}

.text-\[12px\]{
  font-size: 12px;
}

.text-\[13px\]{
  font-size: 13px;
}

.text-base{
  font-size: 1rem;
  line-height: 1.5rem;
}

.text-lg{
  font-size: 1.125rem;
  line-height: 1.75rem;
}

.text-sm{
  font-size: 0.875rem;
  line-height: 1.25rem;
}

.text-xl{
  font-size: 1.25rem;
  line-height: 1.75rem;
}

.font-bold{
  font-weight: 700;
}

.font-medium{
  font-weight: 500;
}

.font-normal{
  font-weight: 400;
}

.font-semibold{
  font-weight: 600;
}

.uppercase{
  text-transform: uppercase;
}

.leading-none{
  line-height: 1;
}

.tracking-wide{
  letter-spacing: 0.025em;
}

.text-blue-500{
  --tw-text-opacity: 1;
  color: rgb(59 130 246 / var(--tw-text-opacity));
}

.text-emerald-500{
  --tw-text-opacity: 1;
  color: rgb(16 185 129 / var(--tw-text-opacity));
}

.text-gray-300{
  --tw-text-opacity: 1;
  color: rgb(209 213 219 / var(--tw-text-opacity));
}

.text-gray-400{
  --tw-text-opacity: 1;
  color: rgb(156 163 175 / var(--tw-text-opacity));
}

.text-gray-600{
  --tw-text-opacity: 1;
  color: rgb(75 85 99 / var(--tw-text-opacity));
}

.text-gray-800{
  --tw-text-opacity: 1;
  color: rgb(31 41 55 / var(--tw-text-opacity));
}

.text-rose-500{
  --tw-text-opacity: 1;
  color: rgb(244 63 94 / var(--tw-text-opacity));
}

.text-white{
  --tw-text-opacity: 1;
  color: rgb(255 255 255 / var(--tw-text-opacity));
}

.shadow-md{
  --tw-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
  --tw-shadow-colored: 0 4px 6px -1px var(--tw-shadow-color), 0 2px 4px -2px var(--tw-shadow-color);
  box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}

.shadow-black\/10{
  --tw-shadow-color: rgb(0 0 0 / 0.1);
  --tw-shadow: var(--tw-shadow-colored);
}

.shadow-black\/5{
  --tw-shadow-color: rgb(0 0 0 / 0.05);
  --tw-shadow: var(--tw-shadow-colored);
}

.outline-none{
  outline: 2px solid transparent;
  outline-offset: 2px;
}

.transition-all{
  transition-property: all;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  transition-duration: 150ms;
}

.transition-transform{
  transition-property: transform;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  transition-duration: 150ms;
}

.notification-tab > .active{
  --tw-border-opacity: 1;
  border-bottom-color: rgb(59 130 246 / var(--tw-border-opacity));
  --tw-text-opacity: 1;
  color: rgb(59 130 246 / var(--tw-text-opacity));
}

.notification-tab > .active:hover{
  --tw-text-opacity: 1;
  color: rgb(59 130 246 / var(--tw-text-opacity));
}

.order-tab > .active{
  --tw-bg-opacity: 1;
  background-color: rgb(59 130 246 / var(--tw-bg-opacity));
  --tw-text-opacity: 1;
  color: rgb(255 255 255 / var(--tw-text-opacity));
}

.order-tab > .active:hover{
  --tw-text-opacity: 1;
  color: rgb(255 255 255 / var(--tw-text-opacity));
}

@media (min-width: 768px){
  .main.active{
    margin-left: 0px;
    width: 100%;
  }
}

.before\:mr-3::before{
  content: var(--tw-content);
  margin-right: 0.75rem;
}

.before\:h-1::before{
  content: var(--tw-content);
  height: 0.25rem;
}

.before\:w-1::before{
  content: var(--tw-content);
  width: 0.25rem;
}

.before\:rounded-full::before{
  content: var(--tw-content);
  border-radius: 9999px;
}

.before\:bg-gray-300::before{
  content: var(--tw-content);
  --tw-bg-opacity: 1;
  background-color: rgb(209 213 219 / var(--tw-bg-opacity));
}

.hover\:bg-gray-50:hover{
  --tw-bg-opacity: 1;
  background-color: rgb(249 250 251 / var(--tw-bg-opacity));
}

.hover\:bg-gray-950:hover{
  --tw-bg-opacity: 1;
  background-color: rgb(3 7 18 / var(--tw-bg-opacity));
}

.hover\:text-blue-500:hover{
  --tw-text-opacity: 1;
  color: rgb(59 130 246 / var(--tw-text-opacity));
}

.hover\:text-blue-600:hover{
  --tw-text-opacity: 1;
  color: rgb(37 99 235 / var(--tw-text-opacity));
}

.hover\:text-gray-100:hover{
  --tw-text-opacity: 1;
  color: rgb(243 244 246 / var(--tw-text-opacity));
}

.hover\:text-gray-600:hover{
  --tw-text-opacity: 1;
  color: rgb(75 85 99 / var(--tw-text-opacity));
}

.focus\:border-blue-500:focus{
  --tw-border-opacity: 1;
  border-color: rgb(59 130 246 / var(--tw-border-opacity));
}

.group:hover .group-hover\:text-blue-500{
  --tw-text-opacity: 1;
  color: rgb(59 130 246 / var(--tw-text-opacity));
}

.group.selected .group-\[\.selected\]\:block{
  display: block;
}

.group.selected .group-\[\.selected\]\:rotate-90{
  --tw-rotate: 90deg;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
}

.group.active .group-\[\.active\]\:bg-gray-800{
  --tw-bg-opacity: 1;
  background-color: rgb(31 41 55 / var(--tw-bg-opacity));
}

.group.selected .group-\[\.selected\]\:bg-gray-950{
  --tw-bg-opacity: 1;
  background-color: rgb(3 7 18 / var(--tw-bg-opacity));
}

.group.active .group-\[\.active\]\:text-white{
  --tw-text-opacity: 1;
  color: rgb(255 255 255 / var(--tw-text-opacity));
}

.group.selected .group-\[\.selected\]\:text-gray-100{
  --tw-text-opacity: 1;
  color: rgb(243 244 246 / var(--tw-text-opacity));
}

@media (min-width: 768px){
  .md\:ml-64{
    margin-left: 16rem;
  }

  .md\:hidden{
    display: none;
  }

  .md\:w-\[calc\(100\%-256px\)\]{
    width: calc(100% - 256px);
  }

  .md\:grid-cols-2{
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }
}

@media (min-width: 1024px){
  .lg\:col-span-2{
    grid-column: span 2 / span 2;
  }

  .lg\:grid-cols-2{
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }

  .lg\:grid-cols-3{
    grid-template-columns: repeat(3, minmax(0, 1fr));
  }
}
    </style>

</head>

<body class="bg-gray-50 h-min">






    </head>

    <body class="text-gray-800 font-inter">
        <!--sidenav -->
        <div class="fixed top-0 left-0 z-50 w-64 h-full p-4 transition-transform bg-gray-100 sidebar-menu">
            <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">

                <h2 class="text-2xl font-bold">LOREM <span class="bg-[#f84525] text-white px-2 rounded-md">IPSUM</span>
                </h2>
            </a>
            <ul class="mt-4">
                <span class="font-bold text-gray-400">ADMIN</span>
                <li class="mb-1 group">
                    <a href=""
                        class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                        <i class="mr-3 text-lg ri-home-2-line"></i>
                        <span class="text-sm">Dashboard</span>
                    </a>
                </li>
                <li class="mb-1 group">
                    <a href=""
                        class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                        <i class='mr-3 text-lg bx bx-user'></i>
                        <span class="text-sm">Users</span>
                        <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                    </a>
                    <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                        <li class="mb-4">
                            <a href=""
                                class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">All</a>
                        </li>
                        <li class="mb-4">
                            <a href=""
                                class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Roles</a>
                        </li>
                    </ul>
                </li>
                <li class="mb-1 group">
                    <a href=""
                        class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                        <i class='mr-3 text-lg bx bx-list-ul'></i>
                        <span class="text-sm">Activities</span>
                    </a>
                </li>
                <span class="font-bold text-gray-400">BLOG</span>
                <li class="mb-1 group">
                    <a href=""
                        class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                        <i class='mr-3 text-lg bx bxl-blogger'></i>
                        <span class="text-sm">Post</span>
                        <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                    </a>
                    <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                        <li class="mb-4">
                            <a href=""
                                class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">All</a>
                        </li>
                        <li class="mb-4">
                            <a href=""
                                class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Categories</a>
                        </li>
                    </ul>
                </li>
                <li class="mb-1 group">
                    <a href=""
                        class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                        <i class='mr-3 text-lg bx bx-archive'></i>
                        <span class="text-sm">Archive</span>
                    </a>
                </li>
                <span class="font-bold text-gray-400">PERSONAL</span>
                <li class="mb-1 group">
                    <a href=""
                        class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                        <i class='mr-3 text-lg bx bx-bell'></i>
                        <span class="text-sm">Notifications</span>
                        <span
                            class=" md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-600 bg-red-200 rounded-full">5</span>
                    </a>
                </li>
                <li class="mb-1 group">
                    <a href=""
                        class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                        <i class='mr-3 text-lg bx bx-envelope'></i>
                        <span class="text-sm">Messages</span>
                        <span
                            class=" md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-green-600 bg-green-200 rounded-full">2
                            New</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="fixed top-0 left-0 z-40 w-full h-full bg-black/50 md:hidden sidebar-overlay"></div>
        <!-- end sidenav -->

        <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
            <!-- navbar -->
            <div class="py-2 px-6 bg-[#f8f4f3] flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
                <button type="button" class="text-lg font-semibold text-gray-900 sidebar-toggle">
                    <i class="ri-menu-line"></i>
                </button>

                <ul class="flex items-center ml-auto">
                    <li class="mr-1 dropdown">
                        <button type="button"
                            class="flex items-center justify-center w-8 h-8 mr-4 text-gray-400 rounded dropdown-toggle hover:text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                class="rounded-full hover:bg-gray-100" viewBox="0 0 24 24"
                                style="fill: gray;transform: ;msFilter:;">
                                <path
                                    d="M19.023 16.977a35.13 35.13 0 0 1-1.367-1.384c-.372-.378-.596-.653-.596-.653l-2.8-1.337A6.962 6.962 0 0 0 16 9c0-3.859-3.14-7-7-7S2 5.141 2 9s3.14 7 7 7c1.763 0 3.37-.66 4.603-1.739l1.337 2.8s.275.224.653.596c.387.363.896.854 1.384 1.367l1.358 1.392.604.646 2.121-2.121-.646-.604c-.379-.372-.885-.866-1.391-1.36zM9 14c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z">
                                </path>
                            </svg>
                        </button>
                        <div
                            class="z-30 hidden w-full max-w-xs bg-white border border-gray-100 rounded-md shadow-md dropdown-menu shadow-black/5">
                            <form action="" class="p-4 border-b border-b-gray-100">
                                <div class="relative w-full">
                                    <input type="text"
                                        class="w-full py-2 pl-10 pr-4 text-sm border border-gray-100 rounded-md outline-none bg-gray-50 focus:border-blue-500"
                                        placeholder="Search...">
                                    <i
                                        class="absolute text-gray-900 -translate-y-1/2 ri-search-line top-1/2 left-4"></i>
                                </div>
                            </form>
                        </div>
                    </li>
                    <li class="dropdown">
                        <button type="button"
                            class="flex items-center justify-center w-8 h-8 mr-4 text-gray-400 rounded dropdown-toggle hover:text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                class="rounded-full hover:bg-gray-100" viewBox="0 0 24 24"
                                style="fill: gray;transform: ;msFilter:;">
                                <path
                                    d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707A.996.996 0 0 0 3 16v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2a.996.996 0 0 0-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707A.996.996 0 0 0 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zm-7 5a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22z">
                                </path>
                            </svg>
                        </button>
                        <div
                            class="z-30 hidden w-full max-w-xs bg-white border border-gray-100 rounded-md shadow-md dropdown-menu shadow-black/5">
                            <div class="flex items-center px-4 pt-4 border-b border-b-gray-100 notification-tab">
                                <button type="button" data-tab="notification" data-tab-page="notifications"
                                    class="text-gray-400 font-medium text-[13px] hover:text-gray-600 border-b-2 border-b-transparent mr-4 pb-1 active">Notifications</button>
                                <button type="button" data-tab="notification" data-tab-page="messages"
                                    class="text-gray-400 font-medium text-[13px] hover:text-gray-600 border-b-2 border-b-transparent mr-4 pb-1">Messages</button>
                            </div>
                            <div class="my-2">
                                <ul class="overflow-y-auto max-h-64" data-tab-for="notification"
                                    data-page="notifications">
                                    <li>
                                        <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-50 group">
                                            <img src="https://placehold.co/32x32" alt=""
                                                class="block object-cover w-8 h-8 align-middle rounded">
                                            <div class="ml-2">
                                                <div
                                                    class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                    New order</div>
                                                <div class="text-[11px] text-gray-400">from a user</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-50 group">
                                            <img src="https://placehold.co/32x32" alt=""
                                                class="block object-cover w-8 h-8 align-middle rounded">
                                            <div class="ml-2">
                                                <div
                                                    class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                    New order</div>
                                                <div class="text-[11px] text-gray-400">from a user</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-50 group">
                                            <img src="https://placehold.co/32x32" alt=""
                                                class="block object-cover w-8 h-8 align-middle rounded">
                                            <div class="ml-2">
                                                <div
                                                    class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                    New order</div>
                                                <div class="text-[11px] text-gray-400">from a user</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-50 group">
                                            <img src="https://placehold.co/32x32" alt=""
                                                class="block object-cover w-8 h-8 align-middle rounded">
                                            <div class="ml-2">
                                                <div
                                                    class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                    New order</div>
                                                <div class="text-[11px] text-gray-400">from a user</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-50 group">
                                            <img src="https://placehold.co/32x32" alt=""
                                                class="block object-cover w-8 h-8 align-middle rounded">
                                            <div class="ml-2">
                                                <div
                                                    class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                    New order</div>
                                                <div class="text-[11px] text-gray-400">from a user</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="hidden overflow-y-auto max-h-64" data-tab-for="notification"
                                    data-page="messages">
                                    <li>
                                        <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-50 group">
                                            <img src="https://placehold.co/32x32" alt=""
                                                class="block object-cover w-8 h-8 align-middle rounded">
                                            <div class="ml-2">
                                                <div
                                                    class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                    John Doe</div>
                                                <div class="text-[11px] text-gray-400">Hello there!</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-50 group">
                                            <img src="https://placehold.co/32x32" alt=""
                                                class="block object-cover w-8 h-8 align-middle rounded">
                                            <div class="ml-2">
                                                <div
                                                    class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                    John Doe</div>
                                                <div class="text-[11px] text-gray-400">Hello there!</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-50 group">
                                            <img src="https://placehold.co/32x32" alt=""
                                                class="block object-cover w-8 h-8 align-middle rounded">
                                            <div class="ml-2">
                                                <div
                                                    class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                    John Doe</div>
                                                <div class="text-[11px] text-gray-400">Hello there!</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-50 group">
                                            <img src="https://placehold.co/32x32" alt=""
                                                class="block object-cover w-8 h-8 align-middle rounded">
                                            <div class="ml-2">
                                                <div
                                                    class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                    John Doe</div>
                                                <div class="text-[11px] text-gray-400">Hello there!</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center px-4 py-2 hover:bg-gray-50 group">
                                            <img src="https://placehold.co/32x32" alt=""
                                                class="block object-cover w-8 h-8 align-middle rounded">
                                            <div class="ml-2">
                                                <div
                                                    class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                                    John Doe</div>
                                                <div class="text-[11px] text-gray-400">Hello there!</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <button id="fullscreen-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            class="rounded-full hover:bg-gray-100" viewBox="0 0 24 24"
                            style="fill: gray;transform: ;msFilter:;">
                            <path d="M5 5h5V3H3v7h2zm5 14H5v-5H3v7h7zm11-5h-2v5h-5v2h7zm-2-4h2V3h-7v2h5z"></path>
                        </svg>
                    </button>
                    <script>
                        const fullscreenButton = document.getElementById('fullscreen-button');

                        fullscreenButton.addEventListener('click', toggleFullscreen);

                        function toggleFullscreen() {
                            if (document.fullscreenElement) {
                                // If already in fullscreen, exit fullscreen
                                document.exitFullscreen();
                            } else {
                                // If not in fullscreen, request fullscreen
                                document.documentElement.requestFullscreen();
                            }
                        }
                    </script>

                    <li class="ml-3 dropdown">
                        <button type="button" class="flex items-center dropdown-toggle">
                            <div class="relative flex-shrink-0 w-10 h-10">
                                <div class="p-1 bg-white rounded-full focus:outline-none focus:ring">
                                    <img class="w-8 h-8 rounded-full"
                                        src="https://laravelui.spruko.com/tailwind/ynex/build/assets/images/faces/9.jpg"
                                        alt="" />
                                    <div
                                        class="absolute top-0 w-3 h-3 border-2 border-white rounded-full left-7 bg-lime-400 animate-ping">
                                    </div>
                                    <div
                                        class="absolute top-0 w-3 h-3 border-2 border-white rounded-full left-7 bg-lime-500">
                                    </div>
                                </div>
                            </div>
                            <div class="p-2 text-left md:block">
                                <h2 class="text-sm font-semibold text-gray-800">John Doe</h2>
                                <p class="text-xs text-gray-500">Administrator</p>
                            </div>
                        </button>
                        <ul
                            class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                            <li>
                                <a href="#"
                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50">Profile</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50">Settings</a>
                            </li>
                            <li>
                                <form method="POST" action="">
                                    <a role="menuitem"
                                        class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50 cursor-pointer"
                                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                        Log Out
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- end navbar -->

            <!-- Content -->
            <div class="p-6">
                <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-2 lg:grid-cols-3">
                    <div class="p-6 bg-white border border-gray-100 rounded-md shadow-md shadow-black/5">
                        <div class="flex justify-between mb-6">
                            <div>
                                <div class="flex items-center mb-1">
                                    <div class="text-2xl font-semibold">2</div>
                                </div>
                                <div class="text-sm font-medium text-gray-400">Users</div>
                            </div>
                            <div class="dropdown">
                                <button type="button" class="text-gray-400 dropdown-toggle hover:text-gray-600"><i
                                        class="ri-more-fill"></i></button>
                                <ul
                                    class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                                    <li>
                                        <a href="#"
                                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <a href="/gebruikers" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
                    </div>
                    <div class="p-6 bg-white border border-gray-100 rounded-md shadow-md shadow-black/5">
                        <div class="flex justify-between mb-4">
                            <div>
                                <div class="flex items-center mb-1">
                                    <div class="text-2xl font-semibold">100</div>
                                    <div
                                        class="p-1 rounded bg-emerald-500/10 text-emerald-500 text-[12px] font-semibold leading-none ml-2">
                                        +30%</div>
                                </div>
                                <div class="text-sm font-medium text-gray-400">Companies</div>
                            </div>
                            <div class="dropdown">
                                <button type="button" class="text-gray-400 dropdown-toggle hover:text-gray-600"><i
                                        class="ri-more-fill"></i></button>
                                <ul
                                    class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                                    <li>
                                        <a href="#"
                                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <a href="/dierenartsen" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
                    </div>
                    <div class="p-6 bg-white border border-gray-100 rounded-md shadow-md shadow-black/5">
                        <div class="flex justify-between mb-6">
                            <div>
                                <div class="mb-1 text-2xl font-semibold">100</div>
                                <div class="text-sm font-medium text-gray-400">Blogs</div>
                            </div>
                            <div class="dropdown">
                                <button type="button" class="text-gray-400 dropdown-toggle hover:text-gray-600"><i
                                        class="ri-more-fill"></i></button>
                                <ul
                                    class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                                    <li>
                                        <a href="#"
                                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <a href="" class="text-[#f84525] font-medium text-sm hover:text-red-800">View</a>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-6 mb-6 lg:grid-cols-2">
                    <div
                        class="relative flex flex-col w-full min-w-0 p-6 mb-4 break-words rounded shadow-lg lg:mb-0 bg-gray-50 dark:bg-gray-800">
                        <div class="px-0 mb-0 border-0 rounded-t">
                            <div class="flex flex-wrap items-center px-4 py-2">
                                <div class="relative flex-1 flex-grow w-full max-w-full">
                                    <h3 class="text-base font-semibold text-gray-900 dark:text-gray-50">Users</h3>
                                </div>
                            </div>
                            <div class="block w-full overflow-x-auto">
                                <table class="items-center w-full bg-transparent border-collapse">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-4 py-3 text-xs font-semibold text-left text-gray-500 uppercase align-middle bg-gray-100 border border-l-0 border-r-0 border-gray-200 border-solid dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500 whitespace-nowrap">
                                                Role</th>
                                            <th
                                                class="px-4 py-3 text-xs font-semibold text-left text-gray-500 uppercase align-middle bg-gray-100 border border-l-0 border-r-0 border-gray-200 border-solid dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500 whitespace-nowrap">
                                                Amount</th>
                                            <th
                                                class="px-4 py-3 text-xs font-semibold text-left text-gray-500 uppercase align-middle bg-gray-100 border border-l-0 border-r-0 border-gray-200 border-solid dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500 whitespace-nowrap min-w-140-px">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <th
                                                class="p-4 px-4 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                                Administrator</th>
                                            <td
                                                class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                                1</td>
                                            <td
                                                class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <span class="mr-2">70%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="flex h-2 overflow-hidden text-xs bg-blue-200 rounded">
                                                            <div style="width: 70%"
                                                                class="flex flex-col justify-center text-center text-white bg-blue-600 shadow-none whitespace-nowrap">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <th
                                                class="p-4 px-4 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                                User</th>
                                            <td
                                                class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                                6</td>
                                            <td
                                                class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <span class="mr-2">40%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="flex h-2 overflow-hidden text-xs bg-blue-200 rounded">
                                                            <div style="width: 40%"
                                                                class="flex flex-col justify-center text-center text-white bg-blue-500 shadow-none whitespace-nowrap">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <th
                                                class="p-4 px-4 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                                User</th>
                                            <td
                                                class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                                5</td>
                                            <td
                                                class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <span class="mr-2">45%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="flex h-2 overflow-hidden text-xs bg-pink-200 rounded">
                                                            <div style="width: 45%"
                                                                class="flex flex-col justify-center text-center text-white bg-pink-500 shadow-none whitespace-nowrap">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="text-gray-700 dark:text-gray-100">
                                            <th
                                                class="p-4 px-4 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                                User</th>
                                            <td
                                                class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                                4</td>
                                            <td
                                                class="p-4 px-4 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <span class="mr-2">60%</span>
                                                    <div class="relative w-full">
                                                        <div
                                                            class="flex h-2 overflow-hidden text-xs bg-red-200 rounded">
                                                            <div style="width: 60%"
                                                                class="flex flex-col justify-center text-center text-white bg-red-500 shadow-none whitespace-nowrap">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 bg-white border border-gray-100 rounded-md shadow-md shadow-black/5">
                        <div class="flex items-start justify-between mb-4">
                            <div class="font-medium">Activities</div>
                            <div class="dropdown">
                                <button type="button" class="text-gray-400 dropdown-toggle hover:text-gray-600"><i
                                        class="ri-more-fill"></i></button>
                                <ul
                                    class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                                    <li>
                                        <a href="#"
                                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="overflow-hidden">
                            <table class="w-full min-w-[540px]">
                                <tbody>
                                    <tr>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <div class="flex items-center">
                                                <a href="#"
                                                    class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-blue-500">Lorem
                                                    Ipsum</a>
                                            </div>
                                        </td>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <span class="text-[13px] font-medium text-gray-400">02-02-2024</span>
                                        </td>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <span class="text-[13px] font-medium text-gray-400">17.45</span>
                                        </td>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <div class="dropdown">
                                                <button type="button"
                                                    class="flex items-center justify-center w-6 h-6 text-sm text-gray-400 rounded dropdown-toggle hover:text-gray-600 bg-gray-50"><i
                                                        class="ri-more-2-fill"></i></button>
                                                <ul
                                                    class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                                                    <li>
                                                        <a href="#"
                                                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <div class="flex items-center">
                                                <a href="#"
                                                    class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-blue-500">Lorem
                                                    Ipsum</a>
                                            </div>
                                        </td>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <span class="text-[13px] font-medium text-gray-400">02-02-2024</span>
                                        </td>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <span class="text-[13px] font-medium text-gray-400">17.45</span>
                                        </td>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <div class="dropdown">
                                                <button type="button"
                                                    class="flex items-center justify-center w-6 h-6 text-sm text-gray-400 rounded dropdown-toggle hover:text-gray-600 bg-gray-50"><i
                                                        class="ri-more-2-fill"></i></button>
                                                <ul
                                                    class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                                                    <li>
                                                        <a href="#"
                                                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-6 mb-6 lg:grid-cols-3">
                    <div class="p-6 bg-white border border-gray-100 rounded-md shadow-md shadow-black/5 lg:col-span-2">
                        <div class="flex items-start justify-between mb-4">
                            <div class="font-medium">Order Statistics</div>
                            <div class="dropdown">
                                <button type="button" class="text-gray-400 dropdown-toggle hover:text-gray-600"><i
                                        class="ri-more-fill"></i></button>
                                <ul
                                    class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                                    <li>
                                        <a href="#"
                                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-2 lg:grid-cols-3">
                            <div class="p-4 border border-gray-200 border-dashed rounded-md">
                                <div class="flex items-center mb-0.5">
                                    <div class="text-xl font-semibold">10</div>
                                    <span
                                        class="p-1 rounded text-[12px] font-semibold bg-blue-500/10 text-blue-500 leading-none ml-1">$80</span>
                                </div>
                                <span class="text-sm text-gray-400">Active</span>
                            </div>
                            <div class="p-4 border border-gray-200 border-dashed rounded-md">
                                <div class="flex items-center mb-0.5">
                                    <div class="text-xl font-semibold">50</div>
                                    <span
                                        class="p-1 rounded text-[12px] font-semibold bg-emerald-500/10 text-emerald-500 leading-none ml-1">+$469</span>
                                </div>
                                <span class="text-sm text-gray-400">Completed</span>
                            </div>
                            <div class="p-4 border border-gray-200 border-dashed rounded-md">
                                <div class="flex items-center mb-0.5">
                                    <div class="text-xl font-semibold">4</div>
                                    <span
                                        class="p-1 rounded text-[12px] font-semibold bg-rose-500/10 text-rose-500 leading-none ml-1">-$130</span>
                                </div>
                                <span class="text-sm text-gray-400">Canceled</span>
                            </div>
                        </div>
                        <div>
                            <canvas id="order-chart"></canvas>
                        </div>
                    </div>
                    <div class="p-6 bg-white border border-gray-100 rounded-md shadow-md shadow-black/5">
                        <div class="flex items-start justify-between mb-4">
                            <div class="font-medium">Earnings</div>
                            <div class="dropdown">
                                <button type="button" class="text-gray-400 dropdown-toggle hover:text-gray-600"><i
                                        class="ri-more-fill"></i></button>
                                <ul
                                    class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                                    <li>
                                        <a href="#"
                                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full min-w-[460px]">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">
                                            Service</th>
                                        <th
                                            class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left">
                                            Earning</th>
                                        <th
                                            class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">
                                            Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <div class="flex items-center">
                                                <img src="https://placehold.co/32x32" alt=""
                                                    class="block object-cover w-8 h-8 rounded">
                                                <a href="#"
                                                    class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-blue-500">Create
                                                    landing page</a>
                                            </div>
                                        </td>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <span class="text-[13px] font-medium text-emerald-500">+$235</span>
                                        </td>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <span
                                                class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Pending</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <div class="flex items-center">
                                                <img src="https://placehold.co/32x32" alt=""
                                                    class="block object-cover w-8 h-8 rounded">
                                                <a href="#"
                                                    class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-blue-500">Create
                                                    landing page</a>
                                            </div>
                                        </td>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <span class="text-[13px] font-medium text-rose-500">-$235</span>
                                        </td>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <span
                                                class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Withdrawn</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <div class="flex items-center">
                                                <img src="https://placehold.co/32x32" alt=""
                                                    class="block object-cover w-8 h-8 rounded">
                                                <a href="#"
                                                    class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-blue-500">Create
                                                    landing page</a>
                                            </div>
                                        </td>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <span class="text-[13px] font-medium text-emerald-500">+$235</span>
                                        </td>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <span
                                                class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Pending</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <div class="flex items-center">
                                                <img src="https://placehold.co/32x32" alt=""
                                                    class="block object-cover w-8 h-8 rounded">
                                                <a href="#"
                                                    class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-blue-500">Create
                                                    landing page</a>
                                            </div>
                                        </td>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <span class="text-[13px] font-medium text-rose-500">-$235</span>
                                        </td>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <span
                                                class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Withdrawn</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <div class="flex items-center">
                                                <img src="https://placehold.co/32x32" alt=""
                                                    class="block object-cover w-8 h-8 rounded">
                                                <a href="#"
                                                    class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-blue-500">Create
                                                    landing page</a>
                                            </div>
                                        </td>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <span class="text-[13px] font-medium text-emerald-500">+$235</span>
                                        </td>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <span
                                                class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Pending</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <div class="flex items-center">
                                                <img src="https://placehold.co/32x32" alt=""
                                                    class="block object-cover w-8 h-8 rounded">
                                                <a href="#"
                                                    class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-blue-500">Create
                                                    landing page</a>
                                            </div>
                                        </td>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <span class="text-[13px] font-medium text-rose-500">-$235</span>
                                        </td>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <span
                                                class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Withdrawn</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <div class="flex items-center">
                                                <img src="https://placehold.co/32x32" alt=""
                                                    class="block object-cover w-8 h-8 rounded">
                                                <a href="#"
                                                    class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-blue-500">Create
                                                    landing page</a>
                                            </div>
                                        </td>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <span class="text-[13px] font-medium text-emerald-500">+$235</span>
                                        </td>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <span
                                                class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Pending</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <div class="flex items-center">
                                                <img src="https://placehold.co/32x32" alt=""
                                                    class="block object-cover w-8 h-8 rounded">
                                                <a href="#"
                                                    class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-blue-500">Create
                                                    landing page</a>
                                            </div>
                                        </td>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <span class="text-[13px] font-medium text-rose-500">-$235</span>
                                        </td>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <span
                                                class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Withdrawn</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <div class="flex items-center">
                                                <img src="https://placehold.co/32x32" alt=""
                                                    class="block object-cover w-8 h-8 rounded">
                                                <a href="#"
                                                    class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-blue-500">Create
                                                    landing page</a>
                                            </div>
                                        </td>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <span class="text-[13px] font-medium text-emerald-500">+$235</span>
                                        </td>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <span
                                                class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none">Pending</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <div class="flex items-center">
                                                <img src="https://placehold.co/32x32" alt=""
                                                    class="block object-cover w-8 h-8 rounded">
                                                <a href="#"
                                                    class="ml-2 text-sm font-medium text-gray-600 truncate hover:text-blue-500">Create
                                                    landing page</a>
                                            </div>
                                        </td>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <span class="text-[13px] font-medium text-rose-500">-$235</span>
                                        </td>
                                        <td class="px-4 py-2 border-b border-b-gray-50">
                                            <span
                                                class="inline-block p-1 rounded bg-rose-500/10 text-rose-500 font-medium text-[12px] leading-none">Withdrawn</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Content -->
        </main>

        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            // start: Sidebar
            const sidebarToggle = document.querySelector('.sidebar-toggle')
            const sidebarOverlay = document.querySelector('.sidebar-overlay')
            const sidebarMenu = document.querySelector('.sidebar-menu')
            const main = document.querySelector('.main')
            sidebarToggle.addEventListener('click', function(e) {
                e.preventDefault()
                main.classList.toggle('active')
                sidebarOverlay.classList.toggle('hidden')
                sidebarMenu.classList.toggle('-translate-x-full')
            })
            sidebarOverlay.addEventListener('click', function(e) {
                e.preventDefault()
                main.classList.add('active')
                sidebarOverlay.classList.add('hidden')
                sidebarMenu.classList.add('-translate-x-full')
            })
            document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function(item) {
                item.addEventListener('click', function(e) {
                    e.preventDefault()
                    const parent = item.closest('.group')
                    if (parent.classList.contains('selected')) {
                        parent.classList.remove('selected')
                    } else {
                        document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function(i) {
                            i.closest('.group').classList.remove('selected')
                        })
                        parent.classList.add('selected')
                    }
                })
            })
            // end: Sidebar



            // start: Popper
            const popperInstance = {}
            document.querySelectorAll('.dropdown').forEach(function(item, index) {
                const popperId = 'popper-' + index
                const toggle = item.querySelector('.dropdown-toggle')
                const menu = item.querySelector('.dropdown-menu')
                menu.dataset.popperId = popperId
                popperInstance[popperId] = Popper.createPopper(toggle, menu, {
                    modifiers: [{
                            name: 'offset',
                            options: {
                                offset: [0, 8],
                            },
                        },
                        {
                            name: 'preventOverflow',
                            options: {
                                padding: 24,
                            },
                        },
                    ],
                    placement: 'bottom-end'
                });
            })
            document.addEventListener('click', function(e) {
                const toggle = e.target.closest('.dropdown-toggle')
                const menu = e.target.closest('.dropdown-menu')
                if (toggle) {
                    const menuEl = toggle.closest('.dropdown').querySelector('.dropdown-menu')
                    const popperId = menuEl.dataset.popperId
                    if (menuEl.classList.contains('hidden')) {
                        hideDropdown()
                        menuEl.classList.remove('hidden')
                        showPopper(popperId)
                    } else {
                        menuEl.classList.add('hidden')
                        hidePopper(popperId)
                    }
                } else if (!menu) {
                    hideDropdown()
                }
            })

            function hideDropdown() {
                document.querySelectorAll('.dropdown-menu').forEach(function(item) {
                    item.classList.add('hidden')
                })
            }

            function showPopper(popperId) {
                popperInstance[popperId].setOptions(function(options) {
                    return {
                        ...options,
                        modifiers: [
                            ...options.modifiers,
                            {
                                name: 'eventListeners',
                                enabled: true
                            },
                        ],
                    }
                });
                popperInstance[popperId].update();
            }

            function hidePopper(popperId) {
                popperInstance[popperId].setOptions(function(options) {
                    return {
                        ...options,
                        modifiers: [
                            ...options.modifiers,
                            {
                                name: 'eventListeners',
                                enabled: false
                            },
                        ],
                    }
                });
            }
            // end: Popper



            // start: Tab
            document.querySelectorAll('[data-tab]').forEach(function(item) {
                item.addEventListener('click', function(e) {
                    e.preventDefault()
                    const tab = item.dataset.tab
                    const page = item.dataset.tabPage
                    const target = document.querySelector('[data-tab-for="' + tab + '"][data-page="' + page +
                        '"]')
                    document.querySelectorAll('[data-tab="' + tab + '"]').forEach(function(i) {
                        i.classList.remove('active')
                    })
                    document.querySelectorAll('[data-tab-for="' + tab + '"]').forEach(function(i) {
                        i.classList.add('hidden')
                    })
                    item.classList.add('active')
                    target.classList.remove('hidden')
                })
            })
            // end: Tab



            // start: Chart
            new Chart(document.getElementById('order-chart'), {
                type: 'line',
                data: {
                    labels: generateNDays(7),
                    datasets: [{
                            label: 'Active',
                            data: generateRandomData(7),
                            borderWidth: 1,
                            fill: true,
                            pointBackgroundColor: 'rgb(59, 130, 246)',
                            borderColor: 'rgb(59, 130, 246)',
                            backgroundColor: 'rgb(59 130 246 / .05)',
                            tension: .2
                        },
                        {
                            label: 'Completed',
                            data: generateRandomData(7),
                            borderWidth: 1,
                            fill: true,
                            pointBackgroundColor: 'rgb(16, 185, 129)',
                            borderColor: 'rgb(16, 185, 129)',
                            backgroundColor: 'rgb(16 185 129 / .05)',
                            tension: .2
                        },
                        {
                            label: 'Canceled',
                            data: generateRandomData(7),
                            borderWidth: 1,
                            fill: true,
                            pointBackgroundColor: 'rgb(244, 63, 94)',
                            borderColor: 'rgb(244, 63, 94)',
                            backgroundColor: 'rgb(244 63 94 / .05)',
                            tension: .2
                        },
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            function generateNDays(n) {
                const data = []
                for (let i = 0; i < n; i++) {
                    const date = new Date()
                    date.setDate(date.getDate() - i)
                    data.push(date.toLocaleString('en-US', {
                        month: 'short',
                        day: 'numeric'
                    }))
                }
                return data
            }

            function generateRandomData(n) {
                const data = []
                for (let i = 0; i < n; i++) {
                    data.push(Math.round(Math.random() * 10))
                }
                return data
            }
            // end: Chart
        </script>

    </body>

</html>