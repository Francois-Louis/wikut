import React, {useEffect} from 'react';
import './projects.scss';
import {useDispatch, useSelector} from "react-redux";


const  Projects = () => {
  const dispatch = useDispatch();
  useEffect(() => {
    dispatch(fetchLastProjects());
  }, []);

  const projectsToDisplay = useSelector((state) => state.Feeder.projectList)

  if (Array.isArray(projectsToDisplay) && projectsToDisplay.length > 0) {
    return (
      <div>
        {projectsToDisplay.map((project, index) => (
          <div key={index} className="project">{project}</div>
        ))}
      </div>
    );
  }
  else if (projectsToDisplay === 'void') {
   return(
     <div>
       <h1>Nothing</h1>
     </div>
   );
  }
  else if (projectsToDisplay === 'error') {
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


export default Projects;

