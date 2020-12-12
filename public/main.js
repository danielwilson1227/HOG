
function initMap() {
	// Your location
	const loc = { lat: 26.13173, lng: -80.17051 };
	// Centered map on location
	const map = new google.maps.Map(document.querySelector('.map'), {
		zoom: 14,
		center: loc
	});
	// The marker, positioned at location
	const marker = new google.maps.Marker({ position: loc, map: map });
}

let imgSrc;
let imgID;
let currentSrcOne;
let currentSrcTwo;
let currentID; 



$('#gallery').on('click', function(e){
	if(e.target.className === 'galleryImg'){
		imgSrc= e.target.src;
		$('#clicked-image').attr('src', imgSrc);
	}})

	$('#galleryModal').on('click', function(e){
		if(e.target.id === 'nextBTN'){
			getID();
			if(Number(parseInt(imgID)) !==24){
			let newNum= Number(parseInt(imgID))+1;
			changeImg(newNum)
		}};
		if(e.target.id === 'prevBTN'){
			getID();
			if(Number(parseInt(imgID)) > 1){
				let newNum= Number(parseInt(imgID))-1;
				changeImg(newNum)
		}}});

		function getID(){
			currentSrcOne=$('#clicked-image').attr('src');
			let reg = /public\/img\/gallery\/img\-\w*.jpg/gi;
			///  img/gallery/img-1.jpg
			currentSrcTwo=currentSrcOne.match(reg);
			currentID=document.querySelector(`[src=${CSS.escape(currentSrcTwo)}]`);
			imgID=currentID.id;
		}
		function changeImg(newNum){
			let newImgID = `${newNum}img`;
			newSrc=document.getElementById(newImgID).src;
			$('#clicked-image').attr('src', newSrc);
		}
