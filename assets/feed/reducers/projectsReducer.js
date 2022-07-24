import {
   SAVE_FETCHED_PROJECTS,
} from "../actions/projectsActions";

const initialSate = {
  projectstodisplay: [],
};

const projectsReducer = (state = initialSate, action = {}) => {
  switch (action.type) {
    case SAVE_FETCHED_PROJECTS:
      return {
        ...state,
        projectstodisplay: action.payload,
      };
    default:
      return state;
  }
};

export default projectsReducer;