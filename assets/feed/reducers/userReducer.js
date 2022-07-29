import {
  SAVE_FETCHED_USER,
} from "../actions/userActions";
import {fetchProjectsToDisplay} from "../actions/projectsActions";

const initialSate = {
  user: [],
};

const userReducer = (state = initialSate, action = {}) => {
  switch (action.type) {
    case SAVE_FETCHED_USER:
      return {
        ...state,
        user: action.payload,
      };
    default:
      return state;
  }
};

export default userReducer;