window.addEventListener('DOMContentLoaded', () => {

            let scroll =
                window.pageYOffset ||
                document.documentElement.scrollTop ||
                window.scrollY;

            /* sec1 */
            function main() {
                let maintit = document.querySelector(".sec1 .maintit h2")
                let face = document.querySelector(".sec1 .face")
                var tl = gsap.timeline();

                tl.to(maintit, {
                    duration: 2,
                    y: "-7vw",
                    opacity: 1,
                })
                tl.to(face, {
                    duration: 1,
                    width: "27vw",
                    height: "27vw",
                    opacity: 1,
                })
            }
            main();



            /* sec2 */

            //span
            document
                .querySelectorAll(".sec2 .txt-wrap .split")
                .forEach((elem) => {
                    let splitText = elem.innerText;
                    let splitWrap = splitText
                        .split("")
                        .join("</span><span aria-hidden='true'>");
                    splitWrap = "<span aria-hidden='true'>" + splitWrap + "</span>";
                    elem.innerHTML = splitWrap;
                    elem.setAttribute("aria-label", splitText);
                });


            window.addEventListener("scroll", () => {
                const sec2Top =
                    window.pageYOffset +
                    document.querySelector(".sec2").getBoundingClientRect().top;

                let abouttit = document.querySelector(".sec2 h2")
                const aboutTop =
                    window.pageYOffset +
                    abouttit.getBoundingClientRect().top;

                let viewpoint = window.innerHeight / 2;
                const aboutTop01 =
                    window.pageYOffset +
                    document.querySelector("#section2 .sec2 .txt-wrap p:nth-child(1)").getBoundingClientRect().top;
                const aboutTop02 =
                    window.pageYOffset +
                    document.querySelector("#section2 .sec2 .txt-wrap p:nth-child(2)").getBoundingClientRect().top;
                const aboutTop03 =
                    window.pageYOffset +
                    document.querySelector("#section2 .sec2 .txt-wrap p:nth-child(3)").getBoundingClientRect().top;
                const aboutTop04 =
                    window.pageYOffset +
                    document.querySelector("#section2 .sec2 .txt-wrap p:nth-child(4)").getBoundingClientRect().top;
                const aboutTop05 =
                    window.pageYOffset +
                    document.querySelector("#section2 .sec2 .txt-wrap p:nth-child(5)").getBoundingClientRect().top;
                const aboutTop06 =
                    window.pageYOffset +
                    document.querySelector("#section2 .sec2 .txt-wrap p:nth-child(6)").getBoundingClientRect().top;
                const aboutTop07 =
                    window.pageYOffset +
                    document.querySelector("#section2 .sec2 .txt-wrap p:nth-child(7)").getBoundingClientRect().top;

                const korTop =
                    window.pageYOffset +
                    document.querySelector("#section2 .sec2 .txt-wrap .kor").getBoundingClientRect().top;

                //LINE, Exposition
                if (scroll >= sec2Top) {
                    document.querySelector(".sec2 h2").classList.add("active")
                }

                //aboutTitle
                if (scroll >= aboutTop - viewpoint)
                    gsap.to(abouttit, {
                        duration: 1,
                        opacity: 1,
                        y: 0,
                    })

                if (scroll >= aboutTop01 - viewpoint) {
                    gsap.to(".sec2 .txt-wrap p:nth-child(1) span", {
                        duration: 0.5,
                        stagger: 0.02,
                        opacity: 1,
                        ease: "bounce.out"
                    })
                }
                if (scroll >= aboutTop02 - viewpoint) {
                    gsap.to(".sec2 .txt-wrap p:nth-child(2) span", {
                        duration: 0.5,
                        stagger: 0.02,
                        opacity: 1,
                        ease: "bounce.out"
                    })
                }
                if (scroll >= aboutTop03 - viewpoint) {
                    gsap.to(".sec2 .txt-wrap p:nth-child(3) span", {
                        duration: 0.5,
                        stagger: 0.02,
                        opacity: 1,
                        ease: "bounce.out"
                    })
                }
                if (scroll >= aboutTop04 - viewpoint) {
                    gsap.to(".sec2 .txt-wrap p:nth-child(4) span", {
                        duration: 0.5,
                        stagger: 0.02,
                        opacity: 1,
                        ease: "bounce.out"
                    })
                }
                if (scroll >= aboutTop05 - viewpoint) {
                    gsap.to(".sec2 .txt-wrap p:nth-child(5) span", {
                        duration: 0.5,
                        stagger: 0.02,
                        opacity: 1,
                        ease: "bounce.out"
                    })
                }
                if (scroll >= aboutTop06 - viewpoint) {
                    gsap.to(".sec2 .txt-wrap p:nth-child(6) span", {
                        duration: 0.5,
                        stagger: 0.02,
                        opacity: 1,
                        ease: "bounce.out"
                    })
                }
                if (scroll >= aboutTop07 - viewpoint) {
                    gsap.to(".sec2 .txt-wrap p:nth-child(7) span", {
                        duration: 0.5,
                        stagger: 0.02,
                        opacity: 1,
                        ease: "bounce.out"
                    })
                }

                if (scroll >= korTop - viewpoint) {
                    gsap.to(".sec2 .txt-wrap .kor em", {
                        duration: 0.3,
                        stagger: 0.3,
                        opacity: 1,
                        ease: "bounce.out"
                    })
                }

            });

        }