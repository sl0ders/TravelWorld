import React, {useState} from 'react';
import AuthApi from "../services/AuthApi";

const LoginPage = ({onLogin, history}) => {
    const [credentials, setCredentials] = useState({
        username: "",
        password: ""
    });

    const [error, setError] = useState('');

    //Gestion des champs
    const handleChange = ({currentTarget}) => {
        const {value, name} = currentTarget;
        setCredentials({...credentials, [name]: value});
    };


    //Gestion du submit
    const handleSudmit = async (e) => {
        e.preventDefault();
        try {
            await AuthApi.authenticate(credentials)
            setError("");
            onLogin(true);
            history.replace('/customers')
        } catch (error) {
            setError('Aucun compte ne possede cette adresse ou alors les informations ne correspondent pas !')
        }
    };

    return (
        <>
            <h1>Connection a l'application</h1>
            <form onSubmit={handleSudmit}>
                <div className="form-group">
                    <label htmlFor="username">Adresse email</label>
                    <input
                        value={credentials.username}
                        onChange={handleChange}
                        placeholder="Adresse email de connection"
                        id="username" name="username"
                        type="email"
                        className={"form-control" + (error && " is-invalid")}
                    />
                    {error && <p className="invalid-feedback">
                        {error}
                    </p>}
                </div>
                <div className="form-group">
                    <label htmlFor="password">Mot de passe</label>
                    <input
                        onChange={handleChange}
                        value={credentials.password}
                        placeholder="Mot de passe"
                        name="password"
                        id="password"
                        type="password"
                        className="form-control"
                    />
                </div>
                <div className="form-group">
                    <button type="submit" className="btn btn-success">Je me connecte</button>
                </div>
            </form>
        </>
    );
};

export default LoginPage;