import React from 'react'
import AuthApi from "../Services/AuthApi";

const Navbar = (props) => {
    return (
        <header className="container-fluid position-relative w-100">
            <nav className="navbar navbar-expand-sm w-100">
                <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span className="navbar-toggler-icon"/><img src="./img/svg/toggle-bar.svg" alt=""/>
                </button>
                <a className="navbar-nav mt-0 mt-lg-0 pointer-event nav-link mr-5" href="/">
                    <img src="./img/svg/home.svg" width="30" alt=""/>
                </a>
                <div className="collapse navbar-collapse" id="collapsibleNavId">
                    <ul className="navbar-nav ml-auto">

                        <a className="" href="">
                            <button className="btn btn-primary">Administration</button>
                        </a>

                        <a className="" href="">
                            <button className="btn btn-danger">deconnection</button>
                        </a>

                        <div className="nav-link text-center">
                            <form action="" method="post" className="form-group">
                                <label htmlFor="adresse_email">
                                    <input type="text" name="_username" placeholder="Adresse email ..." id="adresse_email"
                                           className="form-control"/>
                                </label>
                                <label htmlFor="mot_de_passe">
                                    <input type="text" name="_password" id="mot_de_passe" placeholder="Mot de passe ..."
                                           className="form-control"/>
                                </label>
                                <input type="hidden" name="_csrf_token" value=""/>
                                <button type="submit" className="m-auto p-0 btn-primary btn head">
                                    <img className="" src="./img/arrowhead.svg" alt=""/>
                                </button>
                            </form>
                        </div>
                        <a className="nav-link" href="">
                            <span className="text-white"/>Si vous n'etes pas encore inscrit <img
                            src="./img/arrowhead.svg" alt="" />
                            <button className="btn head btn-primary">S'inscrire</button>
                        </a>

                    </ul>
                </div>
            </nav>
            <h1 className="text-white text-center">Une vie, des voyages</h1>
        </header>
    );
}
export default Navbar;