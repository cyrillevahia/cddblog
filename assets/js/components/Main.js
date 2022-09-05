import React, { Fragment } from 'react';
import about from "../../img/about.jpg";

const Main = () => {
    return (
        <Fragment>
            <main id="main">
                {/* ======= Featured Section ======= */}
                <section id="featured" className="featured">
                    <div className="container">
                        <div className="row">
                            <div className="col-lg-3">
                                <div className="icon-box">
                                    <i className="bi bi-card-checklist" />
                                    <h3><a href="#">Lorem Ipsum</a></h3>
                                    <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                                </div>
                            </div>
                            <div className="col-lg-3 mt-4 mt-lg-0">
                                <div className="icon-box">
                                    <i className="bi bi-bar-chart" />
                                    <h3><a href="#">Dolor Sitema</a></h3>
                                    <p>Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
                                </div>
                            </div>
                            <div className="col-lg-3 mt-4 mt-lg-0">
                                <div className="icon-box">
                                    <i className="bi bi-binoculars" />
                                    <h3><a href="#">Sed ut perspiciatis</a></h3>
                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                                </div>
                            </div>
                            <div className="col-lg-3 mt-4 mt-lg-0">
                                <div className="icon-box">
                                    <i className="bi bi-binoculars" />
                                    <h3><a href="#">Sed ut perspiciatis</a></h3>
                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>{/* End Featured Section */}
                {/* ======= About Section ======= */}
                <section id="about" className="about">
                    <div className="container">
                        <div className="row">
                            <div className="col-lg-6">
                                <img src={about} className="img-fluid" alt="#" />
                            </div>
                            <div className="col-lg-6 pt-4 pt-lg-0 content">
                                <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
                                <p className="fst-italic">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua.
                                </p>
                                <ul>
                                    <li><i className="bi bi-check-circle" /> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                                    <li><i className="bi bi-check-circle" /> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                                    <li><i className="bi bi-check-circle" /> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                                </ul>
                                <p>
                                    Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                    velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                    culpa qui officia deserunt mollit anim id est laborum
                                </p>
                            </div>
                        </div>
                    </div>
                </section>{/* End About Section */}
                {/* ======= Services Section ======= */}
                <section id="services" className="services">
                    <div className="container">
                        <div className="row">
                            <div className="col-lg-4 col-md-6 d-flex align-items-stretch">
                                <div className="icon-box">
                                    <div className="icon"><i className="bx bxl-dribbble" /></div>
                                    <h4><a href="#">Lorem Ipsum</a></h4>
                                    <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                                </div>
                            </div>
                            <div className="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                                <div className="icon-box">
                                    <div className="icon"><i className="bx bx-file" /></div>
                                    <h4><a href="#">Sed ut perspiciatis</a></h4>
                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                                </div>
                            </div>
                            <div className="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                                <div className="icon-box">
                                    <div className="icon"><i className="bx bx-tachometer" /></div>
                                    <h4><a href="#">Magni Dolores</a></h4>
                                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                                </div>
                            </div>
                            <div className="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                                <div className="icon-box">
                                    <div className="icon"><i className="bx bx-world" /></div>
                                    <h4><a href="#">Nemo Enim</a></h4>
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                                </div>
                            </div>
                            <div className="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                                <div className="icon-box">
                                    <div className="icon"><i className="bx bx-slideshow" /></div>
                                    <h4><a href="#">Dele cardo</a></h4>
                                    <p>Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur</p>
                                </div>
                            </div>
                            <div className="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                                <div className="icon-box">
                                    <div className="icon"><i className="bx bx-arch" /></div>
                                    <h4><a href="#">Divera don</a></h4>
                                    <p>Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>{/* End Services Section */}

            </main>{/* End #main */}

        </Fragment>
    )
}

export default Main