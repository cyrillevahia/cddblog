import React from 'react';
import { Fragment } from 'react';
import { useEffect } from 'react';
import { useParams } from 'react-router-dom';
import axios from 'axios';
import { useDispatch, useSelector } from 'react-redux';
import { selectedPost } from '../redus/actions/PostsActions';
import parse from 'html-react-parser';
//import parse from 'html-react-parser/dist/html-react-parser';

const Post = () => {
    const tabpost = useSelector((state) => state.post);
    const { image, theme, titre, chapo, post } = tabpost;
    const { postId } = useParams();
    const dispatch = useDispatch();
    //console.log(postId)
    const fetchPost = async () => {
        const response = await axios
            .get(`https://localhost:8000/api/post/${postId}`)
            .catch((err) => {
                console.log("err", err)
            });

        dispatch(selectedPost(response.data));

    }
    useEffect(() => {
        if (postId && postId !== "") fetchPost();
    }, [postId])
    return (
        <Fragment>

            <main id="main">
                {/* ======= Breadcrumbs ======= */}
                <section id="breadcrumbs" className="breadcrumbs">
                    <div className="container">
                        <ol>
                            <li><a href="index.html">Home</a></li>
                            <li>About Us</li>
                        </ol>
                        <h2>About Us</h2>
                    </div>
                </section>{/* End Breadcrumbs */}
                {/* ======= About Section ======= */}
                <section id="about" className="about">
                    <div className="container">
                        <div className="row">
                            <div className="col-lg-6">
                                <img src={`/images/${image}`} alt={titre} className="img-fluid" />
                            </div>
                            <div className="col-lg-6 pt-4 pt-lg-0 content">
                                <h3>{theme}</h3>
                                <h3>{titre}</h3>
                                <p className="fst-italic">
                                    {chapo}
                                </p>

                                <p>
                                    {post}
                                </p>
                            </div>
                        </div>
                    </div>
                </section>{/* End About Section */}
                {/* ======= Counts Section ======= */}
                <section id="counts" className="counts">
                    <div className="container">
                        <div className="row no-gutters">
                            <div className="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                                <div className="count-box">
                                    <i className="bi bi-emoji-smile" />
                                    <span data-purecounter-start={0} data-purecounter-end={232} data-purecounter-duration={1} className="purecounter" />
                                    <p><strong>Happy Clients</strong> consequuntur quae qui deca rode</p>
                                    <a href="#">Find out more »</a>
                                </div>
                            </div>
                            <div className="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                                <div className="count-box">
                                    <i className="bi bi-journal-richtext" />
                                    <span data-purecounter-start={0} data-purecounter-end={521} data-purecounter-duration={1} className="purecounter" />
                                    <p><strong>Projects</strong> adipisci atque cum quia aut numquam delectus</p>
                                    <a href="#">Find out more »</a>
                                </div>
                            </div>
                            <div className="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                                <div className="count-box">
                                    <i className="bi bi-headset" />
                                    <span data-purecounter-start={0} data-purecounter-end={1463} data-purecounter-duration={1} className="purecounter" />
                                    <p><strong>Hours Of Support</strong> aut commodi quaerat. Aliquam ratione</p>
                                    <a href="#">Find out more »</a>
                                </div>
                            </div>
                            <div className="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                                <div className="count-box">
                                    <i className="bi bi-people" />
                                    <span data-purecounter-start={0} data-purecounter-end={15} data-purecounter-duration={1} className="purecounter" />
                                    <p><strong>Hard Workers</strong> rerum asperiores dolor molestiae doloribu</p>
                                    <a href="#">Find out more »</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>{/* End Counts Section */}


            </main>{/* End #main */}
        </Fragment>

    )
}

export default Post