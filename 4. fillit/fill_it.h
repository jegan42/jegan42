/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   fill_it.h                                          :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jeagan <jeagan@student.42.fr>              +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/05/11 08:34:05 by jeagan            #+#    #+#             */
/*   Updated: 2019/06/02 13:48:09 by jeagan           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#ifndef FILL_IT_H
# define FILL_IT_H
# include "libft.h"
# include <fcntl.h>
# include <limits.h>
# define BUFF_SIZE 1

typedef struct	s_check
{
	char	*line;
	char	**tab;
	int		ok_l;
	int		touch_c;
	int		use;
	int		len;
	int		i_b;
}				t_check;

int				check_file(char *s, int itb[26][5][2]);

void			free_tab(char **tab, int n);
int				free_put_error(char *save);
int				solver(char **map, int itb[26][5][2], int n_bk, int ok);

#endif
