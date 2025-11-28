 document.addEventListener("DOMContentLoaded", function () {
                const card = document.querySelector(".uk-card1");
                const inputs = document.querySelectorAll(".uk-input1, .uk-input2, .uk-input3");
                const buttons = document.querySelectorAll(".uk-button");
                const images = document.querySelectorAll("responsive-img");
                const boxes = document.querySelectorAll(".box");
                const centerText =document.querySelectorAll(".center-text");

                function makeResponsive() {
                    const width = window.innerWidth;

                    // For mobile screens (below 768px)
                    if (width < 768) {
                        if (card) {
                            card.style.width = "90%";
                            card.style.margin = "20px auto";
                            card.style.height = "auto";
                            card.style.padding = "20px";
                        }
                        inputs.forEach(input => {
                            input.style.display = "block";
                            input.style.width = "100%";
                            input.style.margin = "10px auto";
                        });
                        buttons.forEach(btn => {
                            btn.style.display = "block";
                            btn.style.width = "100%";
                            btn.style.margin = "10px auto";
                        });
                        images.forEach(img => {
                            img.style.display = "block";
                            img.style.width = "100%";
                            img.style.margin = "10px auto";
                        });
                        centerText.forEach(centerText => {
                            centerText.style.display = "block";
                            centerText.style.width = "100%";
                            centerText.style.margin = "10px auto";
                        });
                        
                    }

                    // For tablets
                    else if (width >= 768 && width < 1200) {
                        if (card) {
                            card.style.width = "80%";
                            card.style.margin = "30px auto";
                            card.style.height = "auto";
                        }
                        inputs.forEach(input => {
                            input.style.display = "inline-block";
                            input.style.width = "45%";
                            input.style.margin = "10px";
                        });
                        buttons.forEach(btn => {
                            btn.style.display = "block";
                            btn.style.width = "100%";
                            btn.style.margin = "18px";
                        });
                        images.forEach(img => {
                            img.style.display = "block";
                            img.style.width = "100%";
                            img.style.margin = "18px";
                        });
                        centerText.forEach(centerText => {
                            centerText.style.display = "block";
                            centerText.style.width = "100%";
                            centerText.style.margin = "10px";
                        });
                    }

                    // For desktops
                    else {
                        if (card) {
                            card.style.width = "1300px";
                            card.style.margin = "100x 100px";
                            card.style.height = "500px";
                        }
                        inputs.forEach((input, index) => {
                            input.style.display = "inline-block";
                            input.style.width = "250px";
                            input.style.marginLeft = index === 0 ? "200px" : "30px";
                        });
                        buttons.forEach(btn => {
                            btn.style.display = "inline-block";
                            btn.style.width = "120px";
                            btn.style.margin = "15px";
                        });
                        images.forEach(img => {
                            img.style.display = "inline-block";
                            img.style.width = "130px";
                            img.style.margin = "10px";
                        });
                        centerText.forEach(centerText => {
                            centerText.style.display = "inline-block";
                            centerText.style.width = "100%";
                            centerText.style.margin = "10px";
                        });
                    }
                }

                // Run once on load
                makeResponsive();

                // Run on window resize
                window.addEventListener("resize", makeResponsive);
            });