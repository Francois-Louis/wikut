import * as React from 'react';
import {useDispatch, useSelector} from "react-redux";
import {fetchUser} from "../actions/userActions";
import {switchLoading} from "../actions/projectsActions";
import Loader from "./Loader/loader";
import {useEffect} from "react";


const  ProjectsList = () => {
  const dispatch = useDispatch();

  useEffect(() => {
    dispatch(switchLoading(true));
    dispatch(fetchUser());
  }, []);

  // @ts-ignore
  const projects = useSelector((state) => state.Projects.projectstodisplay);
  // @ts-ignore
  const loading = useSelector((state) => state.Projects.loading);

  if (projects.length > 0) {
    return (
      <div>
        {projects.map((project) => { return <div key={project.id}>{project.name}</div>; })}
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

