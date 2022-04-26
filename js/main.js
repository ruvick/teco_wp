// возвращает куки с указанным name,
// или undefined, если ничего не найдено
function getCookie(name) {
	let matches = document.cookie.match(new RegExp(
		"(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
	));
	return matches ? decodeURIComponent(matches[1]) : undefined;
}


function number_format() {
	let elements = document.querySelectorAll('.price_formator');
	for (let elem of elements) {
		elem.dataset.realPrice = elem.innerHTML;
		elem.innerHTML = Number(elem.innerHTML).toLocaleString('ru-RU');
	}
}



document.addEventListener("DOMContentLoaded", () => {
	number_format();
});

// Файлы Java Script ======================================================================================================

const iconMenu = document.querySelector(".icon-menu");
const body = document.querySelector("body");
const menuBody = document.querySelector(".mob-menu");
const menuListItemElems = document.querySelector(".mob-menu__list");
const mobsearch = document.querySelector(".mob-search");
const headsearch = document.querySelector(".header__search");

//BURGER -----------------------------------------------------------
if (iconMenu) {
	iconMenu.addEventListener("click", function () {
		iconMenu.classList.toggle("active");
		body.classList.toggle("lock");
		menuBody.classList.toggle("active");
	});
}

// Закрытие моб меню при клике на якорную ссылку -------------------
if (menuListItemElems) {
	menuListItemElems.addEventListener("click", function () {
		iconMenu.classList.toggle("active");
		body.classList.toggle("lock");
		menuBody.classList.toggle("active");
	});
}

// Закрытие моб меню при клике вне области меню ------------------------------------
window.addEventListener('click', e => { // при клике в любом месте окна браузера
	const target = e.target // находим элемент, на котором был клик
	if (!target.closest('.icon-menu') && !target.closest('.mob-menu') && !target.closest('.mob-search') && !target.closest('.header__search') && !target.closest('._popup-link') && !target.closest('.popup')) { // если этот элемент или его родительские элементы не окно навигации и не кнопка
		iconMenu.classList.remove('active') // то закрываем окно навигации, удаляя активный класс
		menuBody.classList.remove('active')
		body.classList.remove('lock')
	}
})

// Плавная прокрутка -------------------------
// const smotScrollElems = document.querySelectorAll('a[href^="#"]:not(a[href="#"])');

// smotScrollElems.forEach(link => {
// 	link.addEventListener('click', (event) => {
// 		event.preventDefault()
// 		console.log(event);

// 		const id = link.getAttribute('href').substring(1)
// 		console.log('id : ', id);

// 		document.getElementById(id).scrollIntoView({
// 			behavior: 'smooth'
// 		});
// 	})
// });


// SPOLLERS --------------------------------------------------------
/*
Для родителя слойлеров пишем атрибут data-spollers
Для заголовков слойлеров пишем атрибут data-spoller
Если нужно включать\выключать работу спойлеров на разных размерах экранов
пишем параметры ширины и типа брейкпоинта.
Например: 
data-spollers="992,max" - спойлеры будут работать только на экранах меньше или равно 992px
data-spollers="768,min" - спойлеры будут работать только на экранах больше или равно 768px

Если нужно что бы в блоке открывался болько один слойлер добавляем атрибут data-one-spoller
*/

const spollersArray = document.querySelectorAll('[data-spollers]');
if (spollersArray.length > 0) {
	// Получение обычных слойлеров
	const spollersRegular = Array.from(spollersArray).filter(function (item, index, self) {
		return !item.dataset.spollers.split(",")[0];
	});
	// Инициализация обычных слойлеров
	if (spollersRegular.length > 0) {
		initSpollers(spollersRegular);
	}

	// Получение слойлеров с медиа запросами
	const spollersMedia = Array.from(spollersArray).filter(function (item, index, self) {
		return item.dataset.spollers.split(",")[0];
	});

	// Инициализация слойлеров с медиа запросами
	if (spollersMedia.length > 0) {
		const breakpointsArray = [];
		spollersMedia.forEach(item => {
			const params = item.dataset.spollers;
			const breakpoint = {};
			const paramsArray = params.split(",");
			breakpoint.value = paramsArray[0];
			breakpoint.type = paramsArray[1] ? paramsArray[1].trim() : "max";
			breakpoint.item = item;
			breakpointsArray.push(breakpoint);
		});

		// Получаем уникальные брейкпоинты
		let mediaQueries = breakpointsArray.map(function (item) {
			return '(' + item.type + "-width: " + item.value + "px)," + item.value + ',' + item.type;
		});
		mediaQueries = mediaQueries.filter(function (item, index, self) {
			return self.indexOf(item) === index;
		});

		// Работаем с каждым брейкпоинтом
		mediaQueries.forEach(breakpoint => {
			const paramsArray = breakpoint.split(",");
			const mediaBreakpoint = paramsArray[1];
			const mediaType = paramsArray[2];
			const matchMedia = window.matchMedia(paramsArray[0]);

			// Объекты с нужными условиями
			const spollersArray = breakpointsArray.filter(function (item) {
				if (item.value === mediaBreakpoint && item.type === mediaType) {
					return true;
				}
			});
			// Событие
			matchMedia.addListener(function () {
				initSpollers(spollersArray, matchMedia);
			});
			initSpollers(spollersArray, matchMedia);
		});
	}
	// Инициализация
	function initSpollers(spollersArray, matchMedia = false) {
		spollersArray.forEach(spollersBlock => {
			spollersBlock = matchMedia ? spollersBlock.item : spollersBlock;
			if (matchMedia.matches || !matchMedia) {
				spollersBlock.classList.add('_init');
				initSpollerBody(spollersBlock);
				spollersBlock.addEventListener("click", setSpollerAction);
			} else {
				spollersBlock.classList.remove('_init');
				initSpollerBody(spollersBlock, false);
				spollersBlock.removeEventListener("click", setSpollerAction);
			}
		});
	}
	// Работа с контентом
	function initSpollerBody(spollersBlock, hideSpollerBody = true) {
		const spollerTitles = spollersBlock.querySelectorAll('[data-spoller]');
		if (spollerTitles.length > 0) {
			spollerTitles.forEach(spollerTitle => {
				if (hideSpollerBody) {
					spollerTitle.removeAttribute('tabindex');
					if (!spollerTitle.classList.contains('_active')) {
						spollerTitle.nextElementSibling.hidden = true;
					}
				} else {
					spollerTitle.setAttribute('tabindex', '-1');
					spollerTitle.nextElementSibling.hidden = false;
				}
			});
		}
	}
	function setSpollerAction(e) {
		const el = e.target;
		if (el.hasAttribute('data-spoller') || el.closest('[data-spoller]')) {
			const spollerTitle = el.hasAttribute('data-spoller') ? el : el.closest('[data-spoller]');
			const spollersBlock = spollerTitle.closest('[data-spollers]');
			const oneSpoller = spollersBlock.hasAttribute('data-one-spoller') ? true : false;
			if (!spollersBlock.querySelectorAll('._slide').length) {
				if (oneSpoller && !spollerTitle.classList.contains('_active')) {
					hideSpollersBody(spollersBlock);
				}
				spollerTitle.classList.toggle('_active');
				_slideToggle(spollerTitle.nextElementSibling, 500);
			}
			e.preventDefault();
		}
	}
	function hideSpollersBody(spollersBlock) {
		const spollerActiveTitle = spollersBlock.querySelector('[data-spoller]._active');
		if (spollerActiveTitle) {
			spollerActiveTitle.classList.remove('_active');
			_slideUp(spollerActiveTitle.nextElementSibling, 500);
		}
	}
}
// -------------------------------------------------------------------------------

//SlideToggle --------------------------------------------------------------------
let _slideUp = (target, duration = 500) => {
	if (!target.classList.contains('_slide')) {
		target.classList.add('_slide');
		target.style.transitionProperty = 'height, margin, padding';
		target.style.transitionDuration = duration + 'ms';
		target.style.height = target.offsetHeight + 'px';
		target.offsetHeight;
		target.style.overflow = 'hidden';
		target.style.height = 0;
		target.style.paddingTop = 0;
		target.style.paddingBottom = 0;
		target.style.marginTop = 0;
		target.style.marginBottom = 0;
		window.setTimeout(() => {
			target.hidden = true;
			target.style.removeProperty('height');
			target.style.removeProperty('padding-top');
			target.style.removeProperty('padding-bottom');
			target.style.removeProperty('margin-top');
			target.style.removeProperty('margin-bottom');
			target.style.removeProperty('overflow');
			target.style.removeProperty('transition-duration');
			target.style.removeProperty('transition-property');
			target.classList.remove('_slide');
		}, duration);
	}
}
let _slideDown = (target, duration = 500) => {
	if (!target.classList.contains('_slide')) {
		target.classList.add('_slide');
		if (target.hidden) {
			target.hidden = false;
		}
		let height = target.offsetHeight;
		target.style.overflow = 'hidden';
		target.style.height = 0;
		target.style.paddingTop = 0;
		target.style.paddingBottom = 0;
		target.style.marginTop = 0;
		target.style.marginBottom = 0;
		target.offsetHeight;
		target.style.transitionProperty = "height, margin, padding";
		target.style.transitionDuration = duration + 'ms';
		target.style.height = height + 'px';
		target.style.removeProperty('padding-top');
		target.style.removeProperty('padding-bottom');
		target.style.removeProperty('margin-top');
		target.style.removeProperty('margin-bottom');
		window.setTimeout(() => {
			target.style.removeProperty('height');
			target.style.removeProperty('overflow');
			target.style.removeProperty('transition-duration');
			target.style.removeProperty('transition-property');
			target.classList.remove('_slide');
		}, duration);
	}
}
let _slideToggle = (target, duration = 500) => {
	if (target.hidden) {
		return _slideDown(target, duration);
	} else {
		return _slideUp(target, duration);
	}
}
// --------------------------------------------------------------------


// CRM --------------------------------------------------------------------------------------------------------------------------------------
function to_crm(name = '', tel = '', obj = '') {
	let requestURL = "//xn--46-6kcaio0anxtsby.xn--p1ai/modules/m_boxreg.php?get_xml=site&token=FTUYGg45r74r__rhtg75ueVGH4t3___43f&iii=" + name + "&tel1=" + tel + "&realty_id=" + obj;
	const xhr = new XMLHttpRequest();
	xhr.open("get", requestURL);
	xhr.onload = () => {
		console.log("Ok");
	}

	xhr.onerror = () => {
		console.log("error");
	}

	xhr.send();
}

// sendZobj.addEventListener('click', (e) => { 
// 	e.preventDefault();

// 	let requestURL = "//xn--46-6kcaio0anxtsby.xn--p1ai/modules/m_boxreg.php?get_xml=site&token=FTUYGg45r74r__rhtg75ueVGH4t3___43f&iii="+formCallbackName.value+"&tel1="+formCallbackTel.value+"&realty_id="+formLot.value;
// 	const xhr = new XMLHttpRequest();
// 	xhr.open("get", requestURL);
// 	xhr.onload = () => {
// 		console.log("Ok");
// 	}

// 	xhr.onerror = () => {
// 		console.log("error"); 
// 	}

// 	xhr.send();
// });

// CRM END--------------------------------------------------------------------------------------------------------------------------------------

let selectBtnTable = document.querySelector(".v_intable");
let selectBtnList = document.querySelector(".v_select");
if (selectBtnTable)
	selectBtnTable.onclick = () => {
		selectBtnTable.classList.add("v_select")
		selectBtnList.classList.remove("v_select")

		let panels = document.querySelector(".beltCatWrapper")


		panels.classList.remove("beltCatWrapper_list")
		panels.classList.add("beltCatWrapper_table")
	
	}


if (selectBtnList)
	selectBtnList.onclick = () => {
		selectBtnTable.classList.remove("v_select")
		selectBtnList.classList.add("v_select")

		let panels = document.querySelector(".beltCatWrapper")

		panels.classList.add("beltCatWrapper_list")
		panels.classList.remove("beltCatWrapper_table")
	}

let habCard = document.querySelectorAll(".hab_belt_blk");
let habWinWrapper = document.querySelector(".habWinWrapper");
let habWin = document.querySelector(".habWin");
Array.from(habCard).forEach((element, index) => {
	element.onclick = () => {
		console.log("111");
		document.querySelector(".habWinWrapper .habWin h2").innerHTML = element.querySelector(".title .content_m").textContent
		document.querySelector(".habWinWrapper .habWin .bigImg").innerHTML = element.querySelector(".image").innerHTML
		
		document.querySelector(".habWinWrapper .habWin .carecter_in_win .tolsh .content_m").innerHTML = element.querySelector(".tolsh .content_m").textContent
		document.querySelector(".habWinWrapper .habWin .carecter_in_win .sila_t .content_m").innerHTML = element.querySelector(".sila_t .content_m").textContent
		document.querySelector(".habWinWrapper .habWin .carecter_in_win .val_min .content_m").innerHTML = element.querySelector(".val_min .content_m").textContent
		document.querySelector(".habWinWrapper .habWin .carecter_in_win .material .content_m").innerHTML = element.querySelector(".material .content_m").textContent
		document.querySelector(".habWinWrapper .habWin .carecter_in_win .np .content_m").innerHTML = element.querySelector(".np .content_m").textContent
		document.querySelector(".habWinWrapper .habWin .carecter_in_win .count_sl .content_m").innerHTML = element.querySelector(".count_sl .content_m").textContent
		document.querySelector(".habWinWrapper .habWin .carecter_in_win .count_tyg_sl .content_m").innerHTML = element.querySelector(".count_tyg_sl .content_m").textContent
		document.querySelector(".habWinWrapper .habWin .carecter_in_win .dop .content_m").innerHTML = element.querySelector(".dop .content_m").textContent
		document.querySelector(".habWinWrapper .habWin .carecter_in_win .dop .content_m").innerHTML = element.querySelector(".dop .content_m").textContent
		document.querySelector(".habWinWrapper .habWin .carecter_in_win .lnk .content_m").innerHTML = element.querySelector(".lnk .content_m").innerHTML
		
		document.querySelector(".habWinWrapper").style.display = "block"
	}
})

if (habWinWrapper)
	habWinWrapper.onclick = () => {
		console.log(11)
		document.querySelector(".habWinWrapper").style.display = "none"
	}

if (habWin)
	habWin.onclick = (e) => {
		e.stopPropagation()
	}

// Отправщик ----------------------------------------------------------------------------
document.addEventListener("DOMContentLoaded", () => {
	let universal_form = document.getElementsByClassName("universal_form");


	if (universal_form !== undefined) {
		Array.from(universal_form).forEach((element, index) => {
			let unisend_form = element.getElementsByClassName("universal_send_form")[0];
			let unisend_btn = element.getElementsByClassName("u_send")[0];

			unisend_btn.onclick = (e) => {
				// console.log(unisend_form);
				// console.log(unisend_form.getElementsByClassName("_req"));


				let error = form_validate(unisend_form);
				if (error == 0) {
					e.stopPropagation()

					var xhr = new XMLHttpRequest()

					var params = new URLSearchParams()
					params.append('action', 'sendphone')
					params.append('nonce', allAjax.nonce)
					params.append('name', unisend_form.getElementsByClassName("_name")[0].value)
					params.append('tel', unisend_form.getElementsByClassName("_tel")[0].value)

					xhr.onload = function (e) {
						document.location.href = "http://teko.msk.ru/blagodarim-za-obrashhenie";
						// to_crm(unisend_form.getElementsByClassName("_name")[0].value, unisend_form.getElementsByClassName("_tel")[0].value, obj[0].value);
					}

					xhr.onerror = function () {
						error(xhr, xhr.status);
					};

					xhr.open('POST', allAjax.ajaxurl, true);
					xhr.send(params);
				} else {
					let form_error = unisend_form.querySelectorAll('._error');
					if (form_error && unisend_form.classList.contains('_goto-error')) {
						_goto(form_error[0], 1000, 50);
					}
					e.preventDefault();
				}
			}

		});
	}

	// Array.from(unisend_btn).forEach((element, index) => {
	// 		element.onclick = (e) => {
	// 			console.log("ddd");
	// 			let universal_form = document.getElementsByClassName("universal_form")[index]; 
	// 			let unisend_form = document.getElementsByClassName("universal_send_form")[index]; 

	// 			let error = form_validate(unisend_form);
	// 			if (error == 0) {
	// 				e.stopPropagation()

	// 				var xhr = new XMLHttpRequest()

	// 				var params = new URLSearchParams() 
	// 				params.append('action', 'sendphone')
	// 				params.append('nonce', allAjax.nonce)
	// 				params.append('name', unisend_form.getElementsByTagName("name")[0])
	// 				params.append('tel', unisend_form.getElementsByTagName("tel")[0])
	// 				params.append('objname', unisend_form.getElementsByTagName("objname")[0])
	// 				params.append('obj', unisend_form.getElementsByTagName("obj")[0])

	// 				xhr.onload = function(e) {
	// 					universal_form.getElementsByClassName("headen_form_blk")[0].style.display="none";
	// 					universal_form.getElementsByClassName("SendetMsg")[0].style.display="block"; 
	// 				}

	// 				xhr.onerror = function () { 
	// 					error(xhr, xhr.status); 
	// 				};

	// 				xhr.open('POST', allAjax.ajaxurl, true);
	// 				xhr.send(params);
	// 		} else {
	// 					let form_error = unisend_form.querySelectorAll('._error');
	// 					if (form_error && unisend_form.classList.contains('_goto-error')) {
	// 						_goto(form_error[0], 1000, 50);
	// 					}
	// 					e.preventDefault();
	// 				}
	// 		} 
	// })

	// unisend_btn.onclick = (e) => {
	// 	let error = form_validate(unisend_form);
	// 	if (error == 0) {
	// 		e.stopPropagation()
	// 		// console.log(unisend_form.getElementsByClassName("u_send")[0])

	// 		var xhr = new XMLHttpRequest()

	// 		var params = new URLSearchParams() 
	// 		params.append('action', 'sendphone')
	// 		params.append('nonce', allAjax.nonce)
	// 		params.append('name', unisend_form.getElementsByTagName("name")[0])
	// 		params.append('tel', unisend_form.getElementsByTagName("tel")[0])
	// 		params.append('objname', unisend_form.getElementsByTagName("objname")[0])
	// 		params.append('obj', unisend_form.getElementsByTagName("obj")[0])

	// 		xhr.onload = function(e) {
	// 			universal_form.getElementsByClassName("headen_form_blk")[0].style.display="none";
	// 			// unisend_form.getElementsByClassName("popup__policy")[0].style.display="none";
	// 			// unisend_form.getElementsByClassName("popup__form-btn")[0].style.display="none";
	// 			universal_form.getElementsByClassName("SendetMsg")[0].style.display="block"; 
	// 			// window.location.href = "https://forestsea.ru/stranica-blagodarnosti/";
	// 		}

	// 		xhr.onerror = function () { 
	// 			error(xhr, xhr.status); 
	// 		};

	// 		xhr.open('POST', allAjax.ajaxurl, true);
	// 		xhr.send(params);
	//  } else {
	// 			let form_error = unisend_form.querySelectorAll('._error');
	// 			if (form_error && unisend_form.classList.contains('_goto-error')) {
	// 				_goto(form_error[0], 1000, 50);
	// 			}
	// 			e.preventDefault();
	// 		}
	// } 
});


function email_test(input) {
	return !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,8})+$/.test(input.value);
}


var ua = window.navigator.userAgent;
var msie = ua.indexOf("MSIE ");
var isMobile = { Android: function () { return navigator.userAgent.match(/Android/i); }, BlackBerry: function () { return navigator.userAgent.match(/BlackBerry/i); }, iOS: function () { return navigator.userAgent.match(/iPhone|iPad|iPod/i); }, Opera: function () { return navigator.userAgent.match(/Opera Mini/i); }, Windows: function () { return navigator.userAgent.match(/IEMobile/i); }, any: function () { return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows()); } };
function isIE() {
	ua = navigator.userAgent;
	var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;
	return is_ie;
}
if (isIE()) {
	document.querySelector('html').classList.add('ie');
}
if (isMobile.any()) {
	document.querySelector('html').classList.add('_touch');
}

// Получить цифры из строки
//parseInt(itemContactpagePhone.replace(/[^\d]/g, ''))

function testWebP(callback) {
	var webP = new Image();
	webP.onload = webP.onerror = function () {
		callback(webP.height == 2);
	};
	webP.src = "data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA";
}
testWebP(function (support) {
	if (support === true) {
		document.querySelector('html').classList.add('_webp');
	} else {
		document.querySelector('html').classList.add('_no-webp');
	}
});


window.addEventListener("load", function () {
	if (document.querySelector('.wrapper')) {
		setTimeout(function () {
			document.querySelector('.wrapper').classList.add('loaded');
		}, 0);
	}
});

let unlock = true;
//=================


//BodyLock
function body_lock(delay) {
	let body = document.querySelector("body");
	if (body.classList.contains('lock')) {
		body_lock_remove(delay);
	} else {
		body_lock_add(delay);
	}
}
function body_lock_remove(delay) {
	let body = document.querySelector("body");
	if (unlock) {
		let lock_padding = document.querySelectorAll("._lp");
		setTimeout(() => {
			for (let index = 0; index < lock_padding.length; index++) {
				const el = lock_padding[index];
				el.style.paddingRight = '0px';
			}
			body.style.paddingRight = '0px';
			body.classList.remove("lock");
		}, delay);

		unlock = false;
		setTimeout(function () {
			unlock = true;
		}, delay);
	}
}
function body_lock_add(delay) {
	let body = document.querySelector("body");
	if (unlock) {
		let lock_padding = document.querySelectorAll("._lp");
		for (let index = 0; index < lock_padding.length; index++) {
			const el = lock_padding[index];
			el.style.paddingRight = window.innerWidth - document.querySelector('.wrapper').offsetWidth + 'px';
		}
		body.style.paddingRight = window.innerWidth - document.querySelector('.wrapper').offsetWidth + 'px';
		body.classList.add("lock");

		unlock = false;
		setTimeout(function () {
			unlock = true;
		}, delay);
	}
}
//=================


//DigiFormat
function digi(str) {
	var r = str.toString().replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, "$1 ");
	return r;
}
//=================

//Popups
let popup_link = document.querySelectorAll('._popup-link');
let popups = document.querySelectorAll('.popup');
for (let index = 0; index < popup_link.length; index++) {
	const el = popup_link[index];
	el.addEventListener('click', function (e) {
		if (unlock) {
			let item = el.getAttribute('href').replace('#', '');
			let name = el.getAttribute('data-objectname');
			let obj = el.getAttribute('data-object');
			popup_open(item, name, obj);
		}
		e.preventDefault();
	})
}
for (let index = 0; index < popups.length; index++) {
	const popup = popups[index];
	popup.addEventListener("click", function (e) {
		if (!e.target.closest('.popup__body')) {
			popup_close(e.target.closest('.popup'));
		}
	});
}
function popup_open(item, name = '', obj = '') {
	let activePopup = document.querySelectorAll('.popup._active');
	if (activePopup.length > 0) {
		popup_close('', false);
	}
	let curent_popup = document.querySelector('.popup_' + item);
	if (curent_popup && unlock) {
		if (name != '' && name != null) {
			let popup_name = document.querySelector('.obj_in_win_name');
			popup_name.innerHTML = name;
			document.getElementById("form_param_obj_name").value = name;
			document.getElementById("form_param_obj_id").value = obj;
		}
		if (!document.querySelector('.menu__body._active')) {
			body_lock_add(500);
		}
		curent_popup.classList.add('_active');
		history.pushState('', '', '#' + item);
	}
}
function popup_close(item, bodyUnlock = true) {
	if (unlock) {
		if (!item) {
			for (let index = 0; index < popups.length; index++) {
				const popup = popups[index];
				let video = popup.querySelector('.popup__video');
				if (video) {
					video.innerHTML = '';
				}
				popup.classList.remove('_active');
			}
		} else {
			let video = item.querySelector('.popup__video');
			if (video) {
				video.innerHTML = '';
			}
			item.classList.remove('_active');
		}
		if (!document.querySelector('.menu__body._active') && bodyUnlock) {
			body_lock_remove(500);
		}
		history.pushState('', '', window.location.href.split('#')[0]);
	}
}
let popup_close_icon = document.querySelectorAll('.popup__close,._popup-close');
if (popup_close_icon) {
	for (let index = 0; index < popup_close_icon.length; index++) {
		const el = popup_close_icon[index];
		el.addEventListener('click', function () {
			popup_close(el.closest('.popup'));
		})
	}
}
document.addEventListener('keydown', function (e) {
	if (e.code === 'Escape') {
		popup_close();
	}
});

//=================

//Wrap
function _wrap(el, wrapper) {
	el.parentNode.insertBefore(wrapper, el);
	wrapper.appendChild(el);
}
//========================================

//RemoveClasses
function _removeClasses(el, class_name) {
	for (var i = 0; i < el.length; i++) {
		el[i].classList.remove(class_name);
	}
}
//========================================

//IsHidden
function _is_hidden(el) {
	return (el.offsetParent === null)
}


//Полифилы
(function () {
	// проверяем поддержку
	if (!Element.prototype.closest) {
		// реализуем
		Element.prototype.closest = function (css) {
			var node = this;
			while (node) {
				if (node.matches(css)) return node;
				else node = node.parentElement;
			}
			return null;
		};
	}
})();
(function () {
	// проверяем поддержку
	if (!Element.prototype.matches) {
		// определяем свойство
		Element.prototype.matches = Element.prototype.matchesSelector ||
			Element.prototype.webkitMatchesSelector ||
			Element.prototype.mozMatchesSelector ||
			Element.prototype.msMatchesSelector;
	}
})();
// ------------------------------------------------------------------


// Валидация --------------------------------------------------------
function form_validate(form) {
	let error = 0;
	let form_req = form.querySelectorAll('._req');
	if (form_req.length > 0) {
		for (let index = 0; index < form_req.length; index++) {
			const el = form_req[index];
			if (!_is_hidden(el)) {
				error += form_validate_input(el);
			}
		}
	}
	return error;
}
function form_validate_input(input) {
	let error = 0;
	let input_g_value = input.getAttribute('data-value');

	if (input.getAttribute("name") == "email" || input.classList.contains("_email")) {
		if (input.value != input_g_value) {
			let em = input.value.replace(" ", "");
			input.value = em;
		}
		if (email_test(input) || input.value == input_g_value) {
			form_add_error(input);
			error++;
		} else {
			form_remove_error(input);
		}
	} else if (input.getAttribute("type") == "checkbox" && input.checked == false) {
		form_add_error(input);
		error++;
	} else {
		if (input.value == '' || input.value == input_g_value) {
			form_add_error(input);
			error++;
		} else {
			form_remove_error(input);
		}
	}
	return error;
}
function form_add_error(input) {
	input.classList.add('_error');
	input.parentElement.classList.add('_error');

	let input_error = input.parentElement.querySelector('.form__error');
	if (input_error) {
		input.parentElement.removeChild(input_error);
	}
	let input_error_text = input.getAttribute('data-error');
	if (input_error_text && input_error_text != '') {
		input.parentElement.insertAdjacentHTML('beforeend', '<div class="form__error">' + input_error_text + '</div>');
	}
}
function form_remove_error(input) {
	input.classList.remove('_error');
	input.parentElement.classList.remove('_error');

	let input_error = input.parentElement.querySelector('.form__error');
	if (input_error) {
		input.parentElement.removeChild(input_error);
	}
}
function form_clean(form) {
	let inputs = form.querySelectorAll('input,textarea');
	for (let index = 0; index < inputs.length; index++) {
		const el = inputs[index];
		el.parentElement.classList.remove('_focus');
		el.classList.remove('_focus');
		el.value = el.getAttribute('data-value');
	}
	let checkboxes = form.querySelectorAll('.checkbox__input');
	if (checkboxes.length > 0) {
		for (let index = 0; index < checkboxes.length; index++) {
			const checkbox = checkboxes[index];
			checkbox.checked = false;
		}
	}
	let selects = form.querySelectorAll('select');
	if (selects.length > 0) {
		for (let index = 0; index < selects.length; index++) {
			const select = selects[index];
			const select_default_value = select.getAttribute('data-default');
			select.value = select_default_value;
			select_item(select);
		}
	}
}

//viewPass
let viewPass = document.querySelectorAll('._viewpass');
for (let index = 0; index < viewPass.length; index++) {
	const element = viewPass[index];
	element.addEventListener("click", function (e) {
		if (element.classList.contains('_active')) {
			element.parentElement.querySelector('input').setAttribute("type", "password");
		} else {
			element.parentElement.querySelector('input').setAttribute("type", "text");
		}
		element.classList.toggle('_active');
	});
}


//Placeholers
let inputs = document.querySelectorAll('input[data-value],textarea[data-value]');
inputs_init(inputs);

function inputs_init(inputs) {
	if (inputs.length > 0) {
		for (let index = 0; index < inputs.length; index++) {
			const input = inputs[index];
			const input_g_value = input.getAttribute('data-value');
			input_placeholder_add(input);
			if (input.value != '' && input.value != input_g_value) {
				input_focus_add(input);
			}
			input.addEventListener('focus', function (e) {
				if (input.value == input_g_value) {
					input_focus_add(input);
					input.value = '';
				}
				if (input.getAttribute('data-type') === "pass") {
					if (input.parentElement.querySelector('._viewpass')) {
						if (!input.parentElement.querySelector('._viewpass').classList.contains('_active')) {
							input.setAttribute('type', 'password');
						}
					} else {
						input.setAttribute('type', 'password');
					}
				}
				if (input.classList.contains('_date')) {
					/*
					input.classList.add('_mask');
					Inputmask("99.99.9999", {
						//"placeholder": '',
						clearIncomplete: true,
						clearMaskOnLostFocus: true,
						onincomplete: function () {
							input_clear_mask(input, input_g_value);
						}
					}).mask(input);
					*/
				}
				if (input.classList.contains('_phone')) {
					//'+7(999) 999 9999'
					//'+38(999) 999 9999'
					//'+375(99)999-99-99'
					input.classList.add('_mask');
					Inputmask("+7(999) 999 9999", {
						//"placeholder": '',
						clearIncomplete: true,
						clearMaskOnLostFocus: true,
						onincomplete: function () {
							input_clear_mask(input, input_g_value);
						}
					}).mask(input);
				}
				if (input.classList.contains('_digital')) {
					input.classList.add('_mask');
					Inputmask("9{1,}", {
						"placeholder": '',
						clearIncomplete: true,
						clearMaskOnLostFocus: true,
						onincomplete: function () {
							input_clear_mask(input, input_g_value);
						}
					}).mask(input);
				}
				form_remove_error(input);
			});
			input.addEventListener('blur', function (e) {
				if (input.value == '') {
					input.value = input_g_value;
					input_focus_remove(input);
					if (input.classList.contains('_mask')) {
						input_clear_mask(input, input_g_value);
					}
					if (input.getAttribute('data-type') === "pass") {
						input.setAttribute('type', 'text');
					}
				}
			});
			if (input.classList.contains('_date')) {
				const calendarItem = datepicker(input, {
					customDays: ["Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс"],
					customMonths: ["Янв", "Фев", "Мар", "Апр", "Май", "Июн", "Июл", "Авг", "Сен", "Окт", "Ноя", "Дек"],
					overlayButton: 'Применить',
					overlayPlaceholder: 'Год (4 цифры)',
					startDay: 1,
					formatter: (input, date, instance) => {
						const value = date.toLocaleDateString()
						input.value = value
					},
					onSelect: function (input, instance, date) {
						input_focus_add(input.el);
					}
				});
				const dataFrom = input.getAttribute('data-from');
				const dataTo = input.getAttribute('data-to');
				if (dataFrom) {
					calendarItem.setMin(new Date(dataFrom));
				}
				if (dataTo) {
					calendarItem.setMax(new Date(dataTo));
				}
			}
		}
	}
}
function input_placeholder_add(input) {
	const input_g_value = input.getAttribute('data-value');
	if (input.value == '' && input_g_value != '') {
		input.value = input_g_value;
	}
}
function input_focus_add(input) {
	input.classList.add('_focus');
	input.parentElement.classList.add('_focus');
}
function input_focus_remove(input) {
	input.classList.remove('_focus');
	input.parentElement.classList.remove('_focus');
}
function input_clear_mask(input, input_g_value) {
	input.inputmask.remove();
	input.value = input_g_value;
	input_focus_remove(input);
}

//BildSlider
let sliders = document.querySelectorAll('._swiper');
if (sliders) {
	for (let index = 0; index < sliders.length; index++) {
		let slider = sliders[index];
		if (!slider.classList.contains('swiper-bild')) {
			let slider_items = slider.children;
			if (slider_items) {
				for (let index = 0; index < slider_items.length; index++) {
					let el = slider_items[index];
					el.classList.add('swiper-slide');
				}
			}
			let slider_content = slider.innerHTML;
			let slider_wrapper = document.createElement('div');
			slider_wrapper.classList.add('swiper-wrapper');
			slider_wrapper.innerHTML = slider_content;
			slider.innerHTML = '';
			slider.appendChild(slider_wrapper);
			slider.classList.add('swiper-bild');

			if (slider.classList.contains('_swiper_scroll')) {
				let sliderScroll = document.createElement('div');
				sliderScroll.classList.add('swiper-scrollbar');
				slider.appendChild(sliderScroll);
			}
		}
		if (slider.classList.contains('_gallery')) {
			//slider.data('lightGallery').destroy(true);
		}
	}
	sliders_bild_callback();
}

function sliders_bild_callback(params) { }

let sliderScrollItems = document.querySelectorAll('._swiper_scroll');
if (sliderScrollItems.length > 0) {
	for (let index = 0; index < sliderScrollItems.length; index++) {
		const sliderScrollItem = sliderScrollItems[index];
		const sliderScrollBar = sliderScrollItem.querySelector('.swiper-scrollbar');
		const sliderScroll = new Swiper(sliderScrollItem, {
			observer: true,
			observeParents: true,
			direction: 'vertical',
			slidesPerView: 'auto',
			freeMode: true,
			scrollbar: {
				el: sliderScrollBar,
				draggable: true,
				snapOnRelease: false
			},
			mousewheel: {
				releaseOnEdges: true,
			},
		});
		sliderScroll.scrollbar.updateSize();
	}
}


function sliders_bild_callback(params) { }

// Сюда пишем класс нашего слайдера и меняем переменную
let slider = new Swiper('.slider-bg', {
	// effect: 'fade',
	autoplay: {
		delay: 3000,
		disableOnInteraction: false,
	},

	observer: true,
	observeParents: true,
	slidesPerView: 1,
	spaceBetween: 0, //отступ в пикселях
	autoHeight: true,
	speed: 2000,
	//touchRatio: 0,
	//simulateTouch: false,
	loop: true, //циклично
	// slidesPerGroup: 3, //по 3 слайда
	// slideToClickedSlide: true, //клик по слайду
	//preloadImages: false,
	//lazy: true,
	// Dotts
	//pagination: {
	//	el: '.swiper-paggination',
	//	clickable: true,
	//},
	// Arrows
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},
	/*
	breakpoints: {
		320: {
			slidesPerView: 1,
			spaceBetween: 0,
			autoHeight: true,
		},
		768: {
			slidesPerView: 2,
			spaceBetween: 20,
		},
		992: {
			slidesPerView: 3,
			spaceBetween: 20,
		},
		1268: {
			slidesPerView: 4,
			spaceBetween: 30,
		},
	},
	*/
	on: {
		lazyImageReady: function () {
			ibg();
		},
	}
	// And if we need scrollbar
	//scrollbar: {
	//	el: '.swiper-scrollbar',
	//},
});
// Файлы Java Script End =====================================================================================================

$ = jQuery;

// Файлы jQuery ==============================================================================================================

