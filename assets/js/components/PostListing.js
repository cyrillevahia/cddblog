import axios from 'axios';
import React, { useEffect } from 'react'
import { useDispatch, useSelector } from 'react-redux';
import { setPosts } from '../redus/actions/PostsActions';
import { useParams } from 'react-router-dom';
import PostComponent from './PostComponent';

const PostListing = () => {
    const posts = useSelector((state) => state);
    const dispatch = useDispatch();
    const { rubrique } = useParams();
    //console.log(rubrique);
    const fetchPosts = async () => {
        const response = await axios.get(`https://localhost:8000/api/${rubrique}`).catch((err) => {
            console.log("err", err);
        });
        dispatch(setPosts(response.data));
    };
    // TEST




    // FIN TEST

    useEffect(() => {
        fetchPosts();

    }, [rubrique])
    //console.log("posts:", posts);
    return (
        <div><PostComponent /></div>
    )
}
export default PostListing