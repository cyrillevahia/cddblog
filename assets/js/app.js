// ./src/js/app.js

import React from 'react';
//import ReactDOM from 'react-dom';
import ReactDOM from "react-dom/client";
import { BrowserRouter as Router } from 'react-router-dom';
import { Provider } from 'react-redux';
import '../css/app.css';
import Home from './components/Home';

import reducers from './redus/reducers/index';
import { configureStore } from '@reduxjs/toolkit';

const store = configureStore({ reducer: reducers });

const root = ReactDOM.createRoot(document.getElementById("root"));
//ReactDOM.render(<Router><Home /></Router>, document.getElementById('root'));
root.render(
    <React.StrictMode>

        <Provider store={store}>
            <Home />
        </Provider>

    </React.StrictMode>
);
