import { FETCH_PROJECTS_TO_DISPLAY, saveFetchedProjects, switchLoading } from "../actions/projectsActions";
import axios from "axios";

const projectsMiddleware = (store) => next => action => {
  switch (action.type) {
    case FETCH_PROJECTS_TO_DISPLAY:
      for (let i = 0; i < 3; i++) {
        axios.get("http://localhost:8000/api/projects/", {
          headers: { page: i }
        })
          .then(response => {
            store.dispatch(saveFetchedProjects(response.data));
          }).catch(error => {
          console.log(error);
        }).finally(() => {  store.dispatch(switchLoading(false)); } );
      }
      break;
    default:
  }
  next(action);
};

export default projectsMiddleware;