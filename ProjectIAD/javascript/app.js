const navSlide = () =>{
	const burger = document.querySelector('.burger');
	const nav = document.querySelector('.nav-links');
	const navLinks = document.querySelectorAll('.nav-links li');
	
	burger.addEventListener('click', () => {
		//Toggle
		nav.classList.toggle('nav-active');
		
		//Animations
		navLinks.forEach((link, index) => {
			if(link.style.animation){
				link.style.animation = '';
				
			}
			else{
			link.style.animation = `navLinkFades 0.5s ease forwards ${index / 7 + .5}s`;	

			}
		});
		//Burger Ani
		burger.classList.toggle('toggle');
	});
};
navSlide();