import {
  SAVE_FETCHED_PROJECTS,
  SWITCH_LOADING,
} from "../actions/projectsActions";

const initialSate = {
  loading: true,
  projectstodisplay: [],
};

const projectsReducer = (state = initialSate, action = {}) => {
  switch (action.type) {
    case SAVE_FETCHED_PROJECTS:
      return {
        ...state,
        projectstodisplay: action.payload,
      };
    case SWITCH_LOADING:
      return {
        ...state,
        loading: action.payload,
      };
    default:
      return state;
  }
};

export default projectsReducer;