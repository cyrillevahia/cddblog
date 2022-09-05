import React, { Fragment } from 'react';
import slide1 from "../../img/slide/slide-1.jpg";
import slide2 from "../../img/slide/slide-2.jpg";
import slide3 from "../../img/slide/slide-3.jpg";
import Main from './Main';




const Hero = () => {






    return (
        <Fragment>

            <section id="hero">
                <div className="hero-container">
                    <div id="heroCarousel" data-bs-interval={5000} className="carousel slide carousel-fade" data-bs-ride="carousel">
                        <ol className="carousel-indicators" id="hero-carousel-indicators" />
                        <div className="carousel-inner" role="listbox">
                            {/* Slide 1 */}
                            <div className="carousel-item active" style={{ backgroundImage: `url(${slide1})` }}>
                                <div className="carousel-container">
                                    <div className="carousel-content">
                                        <h2 className="animate__animated animate__fadeInDown">Bienvenu chez <span>CDD-Toliara</span></h2>
                                        <p className="animate__animated animate__fadeInUp">Site en cours de construction; veuillez revenir visiter le site plus tard !</p>
                                        <a href="#" className="btn-get-started animate__animated animate__fadeInUp">Read More</a>
                                    </div>
                                </div>
                            </div>
                            {/* Slide 2 */}
                            <div className="carousel-item" style={{ backgroundImage: `url(${slide2})` }}>
                                <div className="carousel-container">
                                    <div className="carousel-content">
                                        <h2 className="animate__animated fanimate__adeInDown">Lorem <span>Ipsum Dolor</span></h2>
                                        <p className="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                                        <a href="#" className="btn-get-started animate__animated animate__fadeInUp">Read More</a>
                                    </div>
                                </div>
                            </div>
                            {/* Slide 3 */}
                            <div className="carousel-item" style={{ backgroundImage: `url(${slide3})` }}>
                                <div className="carousel-container">
                                    <div className="carousel-content">
                                        <h2 className="animate__animated animate__fadeInDown">Sequi ea <span>Dime Lara</span></h2>
                                        <p className="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                                        <a href="#" className="btn-get-started animate__animated animate__fadeInUp">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a className="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                            <span className="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true" />
                        </a>
                        <a className="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                            <span className="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true" />
                        </a>
                    </div>
                </div>
            </section>{/* End Hero */}
            <Main />
        </Fragment>
    )
}

export default Hero;