import React, { Component, Fragment } from 'react';
import { Link } from 'react-router-dom';
//import Hero from './Hero';


const Header = () => {

    return (
        <Fragment>

            <div>

                {/* =======================================================
  * Template Name: Eterna - v4.7.1
  * Template URL: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== */}
            </div>

            {/* ======= Top Bar ======= */}
            <section id="topbar" className="d-flex align-items-center">
                <div className="container d-flex justify-content-center justify-content-md-between">
                    <div className="contact-info d-flex align-items-center">
                        <i className="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@cdd-toliara.org">contact@cdd-toliara.org</a></i>
                        <i className="bi bi-phone d-flex align-items-center ms-4"><span>+261 34 77 309 38</span></i>
                    </div>
                    <div className="social-links d-none d-md-flex align-items-center">
                        <a href="#" className="twitter"><i className="bi bi-twitter" /></a>
                        <a href="#" className="facebook"><i className="bi bi-facebook" /></a>
                        <a href="#" className="instagram"><i className="bi bi-instagram" /></a>
                        <a href="#" className="linkedin"><i className="bi bi-linkedin" /></a>
                    </div>
                </div>
            </section>
            {/* ======= Header ======= */}
            <header id="header" className="d-flex align-items-center">
                <div className="container d-flex justify-content-between align-items-center">
                    <div className="logo">
                        <h1><a href="index.html">CDD-Toliara</a></h1>
                        {/* Uncomment below if you prefer to use an image logo */}
                        {/* <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>*/}
                    </div>
                    <nav id="navbar" className="navbar">
                        <ul>
                            <li><Link className="active" to="/">Accueil</Link></li>

                            <li><Link to="/posts/santé-nutrition">Santé-Nutrition</Link></li>
                            <li><Link to="/posts/gouvernance">Gouvernance</Link></li>
                            <li><Link to="/posts/genre">Genre</Link></li>
                            <li><Link to="/posts/distribution">Distribution</Link></li>
                            <li className="dropdown"><a href="#"><span>Chaîne de valeur</span> <i className="bi bi-chevron-down" /></a>
                                <ul>
                                    <li><a href="#">Ressources Naturelle</a></li>
                                    <li className="dropdown"><a href="#"><span>Livelihoods</span> <i className="bi bi-chevron-right" /></a>
                                        <ul>
                                            <li><a href="#">Pêche</a></li>
                                            <li><a href="#">Agriculture</a></li>
                                            <li><a href="#">Elevage</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">SILC</a></li>

                                </ul>
                            </li>
                            <li><Link to="/apropos">A propos</Link></li>
                            <li><Link to="/contact">Contact</Link></li>
                        </ul>
                        <i className="bi bi-list mobile-nav-toggle" />
                    </nav>{/* .navbar */}
                </div>
            </header>{/* End Header */}

        </Fragment>
    )
}

export default Header;