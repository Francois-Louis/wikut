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

  if (Array.isArray(projects) && projects.length > 0) {
    return (
      <div>
        {projects.map((project, index) => (
          <div key={index} className="project">{project}</div>
        ))}
      </div>
    );
  }
  else if (projects === 'void') {
   return(
     <div>
       <h1>Nothing</h1>
     </div>
   );
  }
  else if (projects === 'error') {
    return(
      <div>
        <h1>Error</h1>
      </div>
    );
  }
  else {
    return (
      <div>
        <Loader />
      </div>
    );
  }
};


export default ProjectsList;

