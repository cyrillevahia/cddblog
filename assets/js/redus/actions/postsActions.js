import { ActionTypes } from "../constants/ActionTypes"
export const setPosts = (posts) => {
    return {
        type: ActionTypes.SET_POSTS,
        payload: posts,
    }
}
export const selectedPost = (post) => {
    return {
        type: ActionTypes.SELECTED_POST,
        payload: post,
    }
}
export const selectedRubrique = (rubrique) => {
    return {
        type: ActionTypes.SELECTED_RUBRIQUE,
        payload: rubrique,
    }
}