import { FETCH_PROJECTS_TO_DISPLAY, saveFetchedProjects, switchLoading } from "../actions/projectsActions";
import axios from "axios";

const projectsMiddleware = (store) => next => action => {
  switch (action.type) {
    case FETCH_PROJECTS_TO_DISPLAY:
      store.dispatch(switchLoading(true),
       axios.get("http://localhost:8000/api/projects")
         .then(response => {
            store.dispatch(saveFetchedProjects(response.data));
        }).catch(error => {
            console.log(error);
      }).finally(() => {  store.dispatch(switchLoading(false)); } ));
      break;
    default:
  }
      next(action);
};

export default projectsMiddleware;