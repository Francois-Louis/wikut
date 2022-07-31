export const FETCH_PROJECTS_TO_DISPLAY = "FETCH_PROJECTS_TO_DISPLAY";
export const SAVE_FETCHED_PROJECTS = "SAVE_FETCHED_PROJECTS";
export const SWITCH_LOADING = "SWITCH_LOADING";

export const fetchProjectsToDisplay = () => ({
  type: FETCH_PROJECTS_TO_DISPLAY
});

export const saveFetchedProjects = (projects) => ({
  type: SAVE_FETCHED_PROJECTS,
  payload: projects
});

export const switchLoading = (status) => ({
  type: SWITCH_LOADING,
  payload: status
});