const podslides = [
	{
		title: '21QLEX1600FE, 21" PRO',
		descr: 'This powerful 21" Ferrite subwoofer brings you 3200 watts of program power (1600 W AES) with ultra-low distortion and air noise thanks to its aluminum demodulation ring and FEA optimized magnetic circuit.',
		price: '606.60 &euro;',
		src: 'https://albin.es/codepen/blurry-slider/slide01-21QLEX1600Fe.png',
		srcset: '',
		bg: '#FF6600',
	},
	{
		title: 'CD10FE/N 1"',
		descr: 'This 1" ferrite compression driver delivers 140 watts of program power (70 WAES) and 109 dB of sensitivity with low distortion, natural sound with high output and extended high frequency response.',
		price: '75.60 &euro;',
		src: 'https://albin.es/codepen/blurry-slider/slide02-CD10Fe-N.png',
		srcset: '',
		bg: '#FF8800',
	},
	{
		title: 'WL4',
		descr: 'This neodymium compression driver with aluminum waveguide provides effective acoustic coupling up to 18 kHz. With a 4” high output and a 0.8” throat, it will deliver 80 Watts (40 WAES) program power with high sensitivity, extended frequency range and a 1500Hz cut-off frequency.',
		price: '468.00 &euro;',
		src: 'https://albin.es/codepen/blurry-slider/slide03-WL4.png',
		srcset: '',
		bg: '#FFAA00',
	},
	{
		title: 'CP12/N',
		descr: 'This ferrite compression tweeter delivers a program power of 30 Watts (15 W. AES) of high frequency response, thanks to its voice coil and its aluminum diaphragm and its precise directivity (40° conical).',
		price: '45.00 &euro;',
		src: 'https://albin.es/codepen/blurry-slider/slide04-CP12N.png',
		srcset: '',
		bg: '#FF8800',
	},
	{
		title: 'T2030',
		descr: 'This  ferrite dome tweeter is designed for high frequency reproduction in multi-way audio systems. It offers a program power of 30 watts (15 watts RMS); with a 1" aluminum voice coil and diaphragm.',
		price: '58.50 &euro;',
		src: 'https://albin.es/codepen/blurry-slider/slide05-T2030.png',
		srcset: '',
		bg: '#FFAA00',
	}
];

class PodSliders {

	constructor(elm) {
		this.elm_wrap   = elm;
		this.elm_text   = elm.querySelector('.podslider_text');
		this.elm_image  = elm.querySelector('.podslider_images');
		this.elm_title  = elm.querySelector('.podslider_title');
		this.elm_descr  = elm.querySelector('.podslider_descr');
		this.elm_price  = elm.querySelector('.podslider_price');
		this.elm_noxt   = elm.querySelector('.podslider_noxt');
		this.elm_next   = elm.querySelector('.podslider_next');
		this.elm_curr   = elm.querySelector('.podslider_curr');
		this.elm_prev   = elm.querySelector('.podslider_prev');
		this.elm_prov   = elm.querySelector('.podslider_prov');
		this.elm_goprev = elm.querySelector('.podslider_goprev');
		this.elm_gonext = elm.querySelector('.podslider_gonext');

		this.elm_curr.addEventListener('transitionend', this.stopped.bind(this));

		const varname = elm.dataset.slides;
		this.slides  = eval(varname) || [];
		this.idx_min = 0;
		this.idx_cur = 0;
		this.idx_max = this.slides.length-1;

		const resized = (entries) => {
			this.elm_wrap.style.setProperty('--grid-size-x', (this.elm_image.offsetWidth / 8)+'px');
			this.elm_wrap.style.setProperty('--grid-size-y', (this.elm_image.offsetHeight / 8)+'px');
		};
		resized();
		(new ResizeObserver(resized)).observe(this.elm_image);

		this.render(false);
    this.elm_wrap.classList.add('shown')
		this.elm_goprev.addEventListener('click', this.render.bind(this, -1));
		this.elm_gonext.addEventListener('click', this.render.bind(this, +1));
	}

	render(moves) {
		const slides = this.get_slides(this.idx_cur);

		if(moves===false) {
			this.elm_prov.src = slides[0].blob || slides[0].src;
			this.elm_prev.src = slides[1].blob || slides[1].src;
			this.elm_curr.src = slides[2].blob || slides[2].src;
			this.elm_next.src = slides[3].blob || slides[3].src;
			this.elm_noxt.src = slides[4].blob || slides[4].src;
		} else {
			if(-1===moves) if(--this.idx_cur<this.idx_min) this.idx_cur = this.idx_max;
			if(+1===moves) if(++this.idx_cur>this.idx_max) this.idx_cur = this.idx_min;
			const cname = moves<0 ? 'backward' : 'foreward';
			this.elm_prov.classList.add(cname);
			this.elm_prev.classList.add(cname);
			this.elm_curr.classList.add(cname);
			this.elm_next.classList.add(cname);
			this.elm_noxt.classList.add(cname);
		}

		this.elm_title.innerHTML = slides[2].title;
		this.elm_descr.innerHTML = slides[2].descr;
		this.elm_price.innerHTML = slides[2].price;
		this.elm_wrap.style.background = slides[2].bg;

	}

	stopped() {
		this.elm_prov.classList.remove('foreward'); this.elm_prov.classList.remove('backward');
		this.elm_prev.classList.remove('foreward'); this.elm_prev.classList.remove('backward');
		this.elm_curr.classList.remove('foreward'); this.elm_curr.classList.remove('backward');
		this.elm_next.classList.remove('foreward'); this.elm_next.classList.remove('backward');
		this.elm_noxt.classList.remove('foreward'); this.elm_noxt.classList.remove('backward');
		this.render(false);
	}

	get_slides(idx) {
		let x1, x2, x3, x4, x5;
		const slides = [];
		x1 = idx-2; if(x1<this.idx_min) x1 = x1 + this.idx_max + 1; slides.push(this.slides[x1]);
		x2 = idx-1; if(x2<this.idx_min) x2 = x2 + this.idx_max + 1; slides.push(this.slides[x2]);
		x3 = idx;                                                   slides.push(this.slides[x3]);
		x4 = idx+1; if(x4>this.idx_max) x4 = x4 - this.idx_max - 1; slides.push(this.slides[x4]);
		x5 = idx+2; if(x5>this.idx_max) x5 = x5 - this.idx_max - 1; slides.push(this.slides[x5]);
		console.log(idx, '>', x1, x2, x3, x4, x5);
		return slides;
	}

}

document.querySelectorAll('.podslider_wrap').forEach(elm => new PodSliders(elm));



// Slider 
