import React, {useEffect} from 'react';
import {useDispatch, useSelector} from "react-redux";
import {fetchProjectsToDisplay} from "../actions/projectsActions";
import Loader from "./Loader/loader";


const  ProjectsList = () => {
  const dispatch = useDispatch();

  useEffect(() => {
    dispatch(fetchProjectsToDisplay());
  }, []);

  const projects = useSelector((state) => state.Projects.projectstodisplay);
  const loading = useSelector((state) => state.Projects.loading);

  console.log(projects)
  console.log(projects[0])
  console.log(projects.length)

  if (projects.length > 0) {
    return (
      <div>
        <h1>Projects</h1>
      </div>
    );
  }
  else if (loading === true) {
    return(
      <div>
        <Loader />
      </div>
    );
  }
  else {
    return (
      <div>
        <h1>Error</h1>
      </div>
    );
  }
};


export default ProjectsList;

