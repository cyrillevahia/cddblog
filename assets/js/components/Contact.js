import React from 'react'

const Contact = () => {
    return (
        <>
            <main id="main">
                {/* ======= Breadcrumbs ======= */}
                <section id="breadcrumbs" className="breadcrumbs">
                    <div className="container">
                        <ol>
                            <li><a href="index.html">Home</a></li>
                            <li>Contact</li>
                        </ol>
                        <h2>Contact</h2>
                    </div>
                </section>{/* End Breadcrumbs */}
                {/* ======= Contact Section ======= */}
                <section id="contact" className="contact">
                    <div className="container">
                        <div className="row">
                            <div className="col-lg-6">
                                <div className="info-box mb-4">
                                    <i className="bx bx-map" />
                                    <h3>Notre adresse</h3>
                                    <p>Conseil Diocésain de Développement / Tsianaloka / 601 Toliara / MADAGASCAR</p>

                                </div>
                            </div>
                            <div className="col-lg-3 col-md-6">
                                <div className="info-box  mb-4">
                                    <i className="bx bx-envelope" />
                                    <h3>Nous écrire</h3>
                                    <p>contact@cdd-toliara.org</p>
                                </div>
                            </div>
                            <div className="col-lg-3 col-md-6">
                                <div className="info-box  mb-4">
                                    <i className="bx bx-phone-call" />
                                    <h3>Nous appeler au</h3>
                                    <p>+261 34 77 309 38</p>
                                </div>
                            </div>
                        </div>
                        <div className="row">
                            <div className="col-lg-6 ">
                                <div className="mapouter"><div className="gmap_canvas"><iframe width={533} height={406} id="gmap_canvas" src="https://maps.google.com/maps?q=CDD%20Toliara&t=&z=17&ie=UTF8&iwloc=&output=embed" frameBorder={0} scrolling="no" marginHeight={0} marginWidth={0} /><a href="https://fmovies-online.net">fmovies</a><br /><style dangerouslySetInnerHTML={{ __html: ".mapouter{position:relative;text-align:right;height:406px;width:533px;}" }} /><a href="https://www.embedgooglemap.net">google maps html</a><style dangerouslySetInnerHTML={{ __html: ".gmap_canvas {overflow:hidden;background:none!important;height:406px;width:533px;}" }} /></div></div>
                            </div>
                            <div className="col-lg-6">
                                <form action="forms/contact.php" method="post" role="form" className="php-email-form">
                                    <div className="row">
                                        <div className="col-md-6 form-group">
                                            <input type="text" name="name" className="form-control" id="name" placeholder="Your Name" required />
                                        </div>
                                        <div className="col-md-6 form-group mt-3 mt-md-0">
                                            <input type="email" className="form-control" name="email" id="email" placeholder="Your Email" required />
                                        </div>
                                    </div>
                                    <div className="form-group mt-3">
                                        <input type="text" className="form-control" name="subject" id="subject" placeholder="Subject" required />
                                    </div>
                                    <div className="form-group mt-3">
                                        <textarea className="form-control" name="message" rows={5} placeholder="Message" required defaultValue={""} />
                                    </div>
                                    <div className="my-3">
                                        <div className="loading">Loading</div>
                                        <div className="error-message" />
                                        <div className="sent-message">Your message has been sent. Thank you!</div>
                                    </div>
                                    <div className="text-center"><button type="submit">Send Message</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>{/* End Contact Section */}
            </main>{/* End #main */}
        </>
    )
}

export default Contact