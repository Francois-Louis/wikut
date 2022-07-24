import { FETCH_PROJECTS_TO_DISPLAY, saveFetchedProjects } from "../actions/projectsActions";

const projectsMiddleware = (store) => next => action => {
  switch (action.type) {
    case FETCH_PROJECTS_TO_DISPLAY:
      fetch ("http://localhost:8000/api/projects?page=1")
        .then(response => {
          response.data.length === 0
            ? store.dispatch(saveFetchedProjects('void'))
            : store.dispatch(saveFetchedProjects(response.data));
        }).catch(error => {
        console.log(error);
        store.dispatch(saveFetchedProjects('error'));
      });
      break;
    default:
  }
      next(action);
};

export default projectsMiddleware;