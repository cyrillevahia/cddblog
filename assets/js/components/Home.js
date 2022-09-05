import React, { Component, Fragment } from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';

import Header from './Header';
import Footer from './Footer';
import Hero from './Hero';
import Post from './Post';
import './../../css/app.css';
import Gouvernance from './Gouvernance';
import Genre from './Genre';
import Distribution from './Distribution';
import ChaineValeur from './ChaineValeur';
import Contact from './Contact';
import PostListing from './PostListing';
import PostComponent from './PostComponent';



class Home extends Component {


    render() {
        return (
            <Fragment>
                <Router>
                    <Header />
                    <Routes>

                        <Route path="/" element={<Hero />} />
                        <Route path="/liste" element={<PostListing />} />
                        <Route path="/post/:postId" element={<Post />} />
                        <Route path="/sante" element={<PostComponent />} />
                        <Route path="/posts/:rubrique" element={<PostListing />} />
                        <Route path="/genre" element={<Genre />} />
                        <Route path="/distribution" element={<Distribution />} />
                        <Route path="/chainevaleur" element={<ChaineValeur />} />
                        <Route path="/contact" element={<Contact />} />
                    </Routes>
                    <Footer />
                </Router>

            </Fragment>
        )
    }
}

export default Home;