import {combineReducers} from "redux";

import projectsReducer from './projectsReducer';

const rootReducer = combineReducers({
  Projects: projectsReducer,
});

export default rootReducer;
