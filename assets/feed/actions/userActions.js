export const FETCH_USER = "FETCH_USER";
export const SAVE_FETCHED_USER = "SAVE_FETCHED_USER";


export const fetchUser = () => ({
  type: FETCH_USER
});

export const saveFetchedUser = (user) => ({
  type: SAVE_FETCHED_USER,
  payload: user
});