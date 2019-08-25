let modal = null
let modalB = null
var totalVideo = 1
var Envoi = 0
const FocusSelect = "button, a, input,textarea"
let focusValide = []


function menuUpload(Loc)
    {
        if (Loc === "serie") 
        {
            window.location = "Video.php";
        }
    }



const openModalUp = async function (e) {
	e.preventDefault()
	const target = e.target.getAttribute('id')
	if (target.startsWith('#')) {
		modalB = document.querySelector(target)
	} else {
		modalB = await loadModal2(target)
	}
	focusValide = Array.from(modalB.querySelectorAll(FocusSelect))
	modalB.style.display = null
	modalB.setAttribute('aria-hidden', 'false')
	modalB.setAttribute('aria-modal', 'true')
	modalB.addEventListener('click', closeModal)
	modalB.querySelector('.js-close-modale').addEventListener('click', closeModal)
	modalB.querySelector('.js-stope-modale').addEventListener('click', stopPropagation)
}


const openModal = async function (e) {
	e.preventDefault()
	const target = e.target.getAttribute('id')
	if (target.startsWith('#')) {
		modal = document.querySelector(target)
	} else {
		modal = await loadModal(target)
	}
	focusValide = Array.from(modal.querySelectorAll(FocusSelect))
	modal.style.display = null
	modal.setAttribute('aria-hidden', 'false')
	modal.setAttribute('aria-modal', 'true')
	modal.addEventListener('click', closeModal)
	modal.querySelector('.js-close-modale').addEventListener('click', closeModal)
	modal.querySelector('.js-stope-modale').addEventListener('click', stopPropagation)
}

const closeModal = function (e) {
	if (modal === null) return

	e.preventDefault()
	modal.style.display = "none"
	modal.setAttribute('aria-hidden', 'true')
	modal.setAttribute('aria-modal', 'false')
	modal.removeEventListener('click', closeModal)
	modal.querySelector('.js-close-modale').removeEventListener('click', closeModal)
	modal.querySelector('.js-stope-modale').removeEventListener('click', stopPropagation)

	modal = null
}

const stopPropagation = function (e) { 
	e.stopPropagation()
}

const focusInModal = function (e) {
	e.preventDefault()
	let index = focusValide.findIndex(f => f === modal.querySelector(':focus'))
	index++
	if (index >= focusValide.length) {
		index = 0
		focusValide[index].focus()
	}
}

const loadModal = async function (url) {

	const target = '#' + url.split('#')[1]
	const html = await fetch(url).then(response => response.text())
	const page = document.createRange().createContextualFragment(html).querySelector(target)
	console.log(html, target)
	if (page === null) {throw 'Element ${target} non trouver'}
	document.body.append(page)
	return page

}

const loadModa2 = async function (url) {

	const target = '#' + url.split('#')[1]
	const html = await fetch(url).then(response => response.text())
	const page = document.createRange().createContextualFragment(html).querySelector(target)
	console.log(html, target)
	if (page === null) {throw 'Element ${target} non trouver'}
	document.body.append(page)
	return page

}

document.querySelectorAll('.bottomConnect').forEach(a => {
	a.addEventListener('click', openModal)
})

document.querySelectorAll('.bottomMenu').forEach(a => {
	a.addEventListener('click', openModal)
})

document.querySelectorAll('.boutonUpload').forEach(a => {
	a.addEventListener('click', closeModal)
	a.addEventListener('click', openModal)
})

window.addEventListener('keydown', function (e) {
	if (e.key === "Escape" || e.key === "Esc")  {
		closeModal(e)
	}
	if (e.key === 'Tab'  && modal !== null) {
		focusInModal(e)	
	}

})
	
	var displayNum1 = []
	displayNum1["bonus1"] = 0
	displayNum1["bonus2"] = 0
	displayNum1["bonus3"] = 0
	displayNum1["bonus4"] = 0
	displayNum1["bonus5"] = 0
	displayNum1["bonus6"] = 0
	displayNum1["bonus7"] = 0
	displayNum1["bonus8"] = 0
	displayNum1["bonus9"] = 0
	displayNum1["bonus10"] = 0
	displayNum1["bonus11"] = 0

function newBonus(num) {

	var num2 = num
	var num3 = num
    num2 - 1;
    num3 + 1;
	if (num < 12) 
	{
		var did = document.getElementById("bonus" + num)
		var visual = document.getElementById("bouton" + num)

		var Ep = document.getElementById("Ep" + num).value
		

		var visual2 = document.getElementById("bouton" + (num2 - 1))

		var Eisode = Ep
		Eisode++ 

		

		if (displayNum1["bonus" + num] == 0) 
		{

			visual.setAttribute('value', '-')
			
 
			if (num > 1) {
				visual2.style.display = "none"
			}


			did.style.display = null
			var EpV = document.getElementById("Ep" + (num3 + 1))
			console.log(EpV, num3)

			displayNum1["bonus" + num] = 1
			EpV.setAttribute('value', Eisode)
			totalVideo++

		} else {

			if (num > 1) {
				visual.setAttribute('value', '+')
				visual2.style.display = null
			}
				
			did.style.display = "none"
			displayNum1["bonus" + num] = 0
			totalVideo--
		}
	}
}





function _(el) {
  return document.getElementById(el);
}

async function uploadFile() {

	if (totalVideo >= 1 && Envoi == 0) 
		{ 
			file = _("fileUpload").files[0];
			uploadEvent(file,"fileUpload")
		 };

	if ((totalVideo >= 2) && (Envoi == 1)) 
		{ 
			file = _("fileUpload2").files[0];
			uploadEvent(file,"fileUpload2")
		 };

	if (totalVideo >= 3 && (Envoi == 2)) 
		{ 
			file = _("fileUpload3").files[0];
			uploadEvent(file,"fileUpload3")
		 };
 
}

function uploadEvent(file,originelle) {

	 
  var formdata = new FormData();
  formdata.append(originelle, file);
  var ajax = new XMLHttpRequest();
  if (originelle === "fileUpload") {
  ajax.upload.addEventListener("progress",  progressHandler, false);
  }

  if (originelle === "fileUpload2") {
  ajax.upload.addEventListener("progress",  progressHandler2, false);
  }

  if (originelle === "fileUpload3") {
  ajax.upload.addEventListener("progress",  progressHandler3, false);
  }

  ajax.addEventListener("load", completeHandler, false);
  ajax.addEventListener("error", errorHandler, false);
  ajax.addEventListener("abort", abortHandler, false);
  ajax.open("POST", "upload/upload.php"); // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
  //use file_upload_parser.php from above url
  ajax.send(formdata);

  

}

function progressHandler(event) {
  var percent = (event.loaded / event.total) * 100;
  _("progress1").value = Math.round(percent);
}

function progressHandler2(event) {
  var percent2 = (event.loaded / event.total) * 100;
  _("progress2").value = Math.round(percent2);
}

function progressHandler3(event) {
  var percent3 = (event.loaded / event.total3) * 100;
  _("progress3").value = Math.round(percent);
}

function completeHandler(event) {
  _("progress1").value = 0; //wil clear progress bar after successful upload
  Envoi++
  uploadFile()
  
}

function errorHandler(event) {
  _("status").innerHTML = "Upload Failed";
}

function abortHandler(event) {
  _("status").innerHTML = "Upload Aborted";
}