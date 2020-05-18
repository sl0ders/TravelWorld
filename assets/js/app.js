import React, {useState} from 'react'
import ReactDOM from 'react-dom'
import Navbar from "./Components/Navbar"
import $ from 'jquery';
import {HashRouter, Switch, Route, withRouter, Redirect} from "react-router-dom";
require('bootstrap')
import '../css/app.css';

import HomePage from "./Pages/HomePage";
import {LeftSide} from "./Components/LeftSide";
import {RightSide} from "./Components/RightSide";
import PicturesPage from "./Pages/PicturesPages";
import AuthApi from "./Services/AuthApi";
import LoginPage from "./Pages/LoginPage";

AuthApi.setup();
const PrivateRoute = ({ path, isAuthenticated, component}) =>
    isAuthenticated ? <Route path={path} component={component} /> : <Redirect to="/login"/>;


const App = () => {
    const [isAuthenticated, setIsAuthenticated] = useState(AuthApi.isAuthenticated());
    return <>
        <HashRouter>
            <Navbar/>
            <div className="row">
                <div className="part-left col-md-2">
                    <LeftSide/>
                </div>
                <div className="container pt-5">
                    <Switch>
                        <Route path="/login" render={props => <LoginPage onLogin={setIsAuthenticated} {...props}/>}/>
                        <PrivateRoute path="/pictures" isAuthenticated={isAuthenticated} component={PicturesPage}/>
                    </Switch>
                    <HomePage/>
                </div>
                <div className="part-right col-md-2">
                    <RightSide/>
                </div>
            </div>
        </HashRouter>
    </>
}

const rootElement = document.querySelector('#app')
ReactDOM.render(<App/>, rootElement)




