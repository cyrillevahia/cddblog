import { combineReducers } from "@reduxjs/toolkit";
import { postReducer, selectedPostReducer, selectedRubriqueReducer } from "./postReducer";

const reducers = combineReducers({
    allPosts: postReducer,
    post: selectedPostReducer,
    rubrique: selectedRubriqueReducer,
})

export default reducers;

