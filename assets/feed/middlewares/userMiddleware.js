import { FETCH_USER, saveFetchedUser} from "../actions/userActions";
import axios from "axios";
import {fetchProjectsToDisplay} from "../actions/projectsActions";
import {useDispatch} from "react-redux";


const userMiddleware = (store) => next => action => {

  switch (action.type) {
    case FETCH_USER:
        axios.get("http://localhost:8000/api/user")
          .then(response => {
            store.dispatch(saveFetchedUser(response.data));
          }).catch(error => {
          console.log(error);
        }).finally(() => {  store.dispatch(fetchProjectsToDisplay()); } );
      break;
    default:
  }
  next(action);
};

export default userMiddleware;