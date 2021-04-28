var eskularr = JSON.parse(eskul);
var prestasiarr = JSON.parse(prestasi);
var kegiatanarr = JSON.parse(kegiatan);
var gambar_sekolaharr = JSON.parse(gambar_sekolah);
var app = new Vue({
    el: '#app',
    data: {
        mainSliderImg: gambar_sekolaharr,
        mainSliderIndex: 0,
        sliderImg: [
            {
                Name: 'Prestasi',
                Data: prestasiarr,
                // Data: [
                //     {
                //         Img: "assets/img/img1.jpg",
                //         Title: "Juara 3 Lomba Tari Jawa Timur",
                //         Desc: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, s diam nonumy eirmod.",
                //         Date: "01 Januari 2020"
                //     },
                //     {
                //         Img: "assets/img/img2.jpg",
                //         Title: "Juara 2 Lomba Tari Jawa Timur",
                //         Desc: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, se diam nonumy eirmod.",
                //         Date: "02 Januari 2020"
                //     },
                //     {
                //         Img: "assets/img/img3.jpg",
                //         Title: "Juara 1 Lomba Tari Jawa Timur",
                //         Desc: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed di nonumy eirmod.",
                //         Date: "03 Januari 2020"
                //     },
                //     {
                //         Img: "assets/img/img4.jpg",
                //         Title: "Juara Harapan 1 Lomba Tari Jawa Timur",
                //         Desc: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod.",
                //         Date: "04 Januari 2020"
                //     },
                // ],
                Index: 0,
            },
            {
                Name: 'Kegiatan',
                Data : kegiatanarr,
                // Data: [
                //     {
                //         Img: "assets/img/img1.jpg",
                //         Title: "Juara 3 Lomba Tari Jawa Timur",
                //         Desc: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, s diam nonumy eirmod.",
                //         Date: "01 Januari 2020"
                //     },
                //     {
                //         Img: "assets/img/img2.jpg",
                //         Title: "Juara 2 Lomba Tari Jawa Timur",
                //         Desc: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, se diam nonumy eirmod.",
                //         Date: "02 Januari 2020"
                //     },
                //     {
                //         Img: "assets/img/img3.jpg",
                //         Title: "Juara 1 Lomba Tari Jawa Timur",
                //         Desc: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed di nonumy eirmod.",
                //         Date: "03 Januari 2020"
                //     },
                //     {
                //         Img: "assets/img/img4.jpg",
                //         Title: "Juara Harapan 1 Lomba Tari Jawa Timur",
                //         Desc: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod.",
                //         Date: "04 Januari 2020"
                //     },
                // ],
                Index: 0,
            },
            {
                Name: 'Ekstrakulikuler',
                Data: eskularr,
                // Data: [
                //     {
                //         Img: "assets/img/img1.jpg",
                //         Title: "Juara 3 Lomba Tari Jawa Timur",
                //         Desc: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, s diam nonumy eirmod.",
                //         Date: "01 Januari 2020"
                //     },
                //     {
                //         Img: "assets/img/img2.jpg",
                //         Title: "Juara 2 Lomba Tari Jawa Timur",
                //         Desc: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, se diam nonumy eirmod.",
                //         Date: "02 Januari 2020"
                //     },
                //     {
                //         Img: "assets/img/img3.jpg",
                //         Title: "Juara 1 Lomba Tari Jawa Timur",
                //         Desc: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed di nonumy eirmod.",
                //         Date: "03 Januari 2020"
                //     },
                //     {
                //         Img: "assets/img/img4.jpg",
                //         Title: "Juara Harapan 1 Lomba Tari Jawa Timur",
                //         Desc: "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod.",
                //         Date: "04 Januari 2020"
                //     },
                // ],
                Index: 0,
            },
        ]
    },
    computed: {
        mainSlider: function () {
            return this.mainSliderImg[this.mainSliderIndex];
        },
        prestasiSlider: function () {
            return this.prestasiSliderImg[this.prestasiSlider];
        }
    },
    methods: {
        subMainSlider: function (value) {
            if ((this.mainSliderIndex + value) < this.mainSliderImg.length) {
                return this.mainSliderImg[this.mainSliderIndex + value];
            } else {
                return this.mainSliderImg[this.mainSliderIndex + value - this.mainSliderImg.length];
            }
        },
        subMainSliderIndex: function (value) {
            if ((this.mainSliderIndex + value) < this.mainSliderImg.length) {
                return this.mainSliderIndex + value;
            } else {
                return this.mainSliderIndex + value - this.mainSliderImg.length;
            }
        },
        changeIntoIndex: function (index) {
            this.mainSliderIndex = index;
        },
        nextSlider: function () {
            if (this.mainSliderIndex < this.mainSliderImg.length - 1) {
                this.mainSliderIndex++;
            } else {
                this.mainSliderIndex = 0;
            }
        },
        prevSlider: function () {
            if (this.mainSliderIndex > 0) {
                this.mainSliderIndex--;
            } else {
                this.mainSliderIndex = this.mainSliderImg.length - 1;
            }
        },

        nextAnotherSlider: function (SliderIndex) {
            if (this.sliderImg[SliderIndex].Index < this.sliderImg[SliderIndex].Data.length - 1) {
                this.sliderImg[SliderIndex].Index++;
            } else {
                this.sliderImg[SliderIndex].Index = 0;
            }
        },
        prevAnotherSlider: function (SliderIndex) {
            if (this.sliderImg[SliderIndex].Index > 0) {
                this.sliderImg[SliderIndex].Index--;
            } else {
                this.sliderImg[SliderIndex].Index = this.sliderImg[SliderIndex].Data.length - 1;
            }
        },
    }
})

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});