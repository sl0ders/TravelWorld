import React from "react";

const AdminHomePage = (props) => {
    return (
        <div className="admin-home text-center">
            <h2>Administration du site <em className="h5">(Page d'accueil)</em></h2>
            <div className="container">
                <div className="row d-flex justify-content-center">
                    <div className="case-country col-md-5 m-3">
                        <a className="text-decoration-none" href="">
                            <h3 className="text-center font-weight-bold mt-3">
                                Gestion des country
                            </h3>
                            <img src="./img/admin_country.png" width="60%" alt=""/>
                        </a>
                    </div>
                    <div className="case-city col-md-5 m-3">
                        <a className="text-decoration-none" href="">
                            <h3 className="text-center font-weight-bold mt-3">
                                Gestion des villes
                            </h3>
                            <img src="./img/admin_city.png" width="60%" alt=""/>
                        </a>
                    </div>
                    <div className="case-picture col-md-5 m-3">
                        <a className="text-decoration-none" href="">
                            <h3 className="text-center font-weight-bold mt-3">Gestion des photos</h3>
                            <img src="./img/admin_picture.png" width="90%" alt=""/></a>
                    </div>
                    <div className="case-user col-md-5 m-3">
                        <a href="">
                            <h3 className="text-center font-weight-bold mt-3">Gestion des utilisateurs</h3>
                            <img src="./img/admin_user.png" width="60%" alt=""/></a>
                    </div>
                    <div className="case-news col-md-5 m-3">
                        <a className="text-decoration-none" href="">
                            <h3 className="text-center font-weight-bold mt-3">Gestion des News</h3>
                            <img src="./img/admin_news.png" width="60%" alt=""/></a>
                    </div>
                    <div className="case-comment col-md-5 m-3">
                        <a className="text-decoration-none" href="">
                            <h3 className="text-center font-weight-bold mt-3">Gestion des Commentaires</h3>
                            <img src="./img/admin_commentaires.png" width="60%" alt=""/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default AdminHomePage