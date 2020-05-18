import React, {useEffect, useState} from 'react'
import PicturesApi from "../Services/PicturesApi";

const PicturesPage = props => {
    const [pictures, setPictures] = useState([]);
    const fetchPictures = async () => {
        try {
            const data = await PicturesApi.findAll()
            setPictures(data);
        } catch (e) {
            console.log(e.response)
        }
    }

    useEffect(() => {
        fetchPictures()
    }, []);
    const handleDelete = async id => {
        const originalPictures = [...pictures];

        setPictures(pictures.filter(picture => picture.id !== id));
        try {
            await PicturesApi.delete(id)
        } catch (e) {
            setPictures(originalPictures);
            console.log(e.response)
        }
    }

    return (
        <>
            <h2>Photo de</h2>
            <div className="gridhome overflow-hidden">
                {pictures.map(picture =>
                    <div className="text-center">
                        <a style="overflow: hidden;" href="">
                            <img src={picture.url} alt={picture.title}/>
                        </a>
                        <div className="text-center" style="margin-bottom: 20px">
                            <a href="">
                                Voir les details de la photo
                            </a>
                            <span className="react-likes" data-likes="" data-is-liked=""/>
                        </div>
                    </div>
                )}
            </div>
        </>
    )
}

export default PicturesPage;
