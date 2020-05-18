import axios from "axios"


function findAll(){
    return axios
        .get("http://127.0.0.1:8000/api/picture")
        .then(response => response.data["hydra:member"])
}

function deletePicture(id) {
    return axios
        .delete("http://127.0.0.1:8000/api/Picture" + id)
}

export default {
    findAll,
    delete:deletePicture
}