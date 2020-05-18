import React from 'react'

export const LeftSide = (props) => {
    return (
        <div>
            <h2 className="font-weight-bold text-center m-3">Nos destinations</h2>
            <div className="container sticky-top">
                <a className="text-decoration-none"
                   href="">
                    <button type="submit" className="p-1 btn btn-primary w-100 d-flex justify-content-between">
                        <span className="h5"/>
                        <img className="mt-auto mb-auto" width="35" height="35" src=""
                             alt=""/>
                    </button>
                </a>
            </div>
            <div className="mt-5">
                <h2 className="font-weight-bold text-center">
                    Administration
                </h2>
                <br/>
                <div className="list-unstyled m-auto">
                    <a className="text-decoration-none" href="">
                        <button type="button" className="btn btn-primary w-100 d-flex justify-content-between">
                            <span className="h5">Gestion des pays</span>
                            <img src="" width="15%" alt=""/>
                        </button>
                    </a>
                    <a className="text-decoration-none" href="">
                        <button className="btn btn-primary w-100 d-flex justify-content-between">
                            <span className="h5">Gestion des villes</span>
                            <img src="" width="15%" alt=""/>
                        </button>
                    </a>
                    <a className="text-decoration-none" href="">
                        <button className="btn btn-primary w-100 d-flex justify-content-between">
                            <span className="h5">Gestion des photos</span>
                            <img src="" width="15%" alt=""/>
                        </button>
                    </a>
                    <a className="text-decoration-none" href="">
                        <button className="btn btn-primary w-100 d-flex justify-content-between">
                            <span className="h5">Gestion des commentaires</span>
                            <img src="" width="15%" alt=""/>
                        </button>
                    </a>
                    <a className="text-decoration-none" href="">
                        <button className="btn btn-primary w-100 d-flex justify-content-between">
                            <span className="h5">Gestion des utilisateurs</span>
                            <img src="" width="15%" alt=""/>
                        </button>
                    </a>
                    <a className="text-decoration-none" href="">
                        <button className="btn btn-primary w-100 d-flex justify-content-between">
                            <span className="h5"/>Gestion des news
                            <img src="" width="15%" alt=""/>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    );
};