import {combineReducers} from "redux";

import projectsReducer from './projectsReducer';
import userReducer from './userReducer';

const rootReducer = combineReducers({
  Projects: projectsReducer,
  User: userReducer,
});

export default rootReducer;
