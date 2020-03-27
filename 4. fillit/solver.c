/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   solver.c                                           :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jeagan <jeagan@student.42.fr>              +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/05/11 08:57:34 by jeagan            #+#    #+#             */
/*   Updated: 2019/06/02 13:48:21 by jeagan           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "fill_it.h"

void			free_tab(char **tab, int n)
{
	int	i;

	i = -1;
	if (n)
		while (tab[++i])
			ft_putendl(tab[i]);
	i = -1;
	while (tab[++i] != 0)
		free(tab[i]);
	free(tab[i]);
	free(tab);
}

int				free_put_error(char *save)
{
	if (save)
		free(save);
	ft_putendl("error");
	return (0);
}

static int		check_place_bk(char ***map, int nk[5][2], int x, int y)
{
	int	i;
	int	n_use;
	int	ref;

	i = -1;
	ref = 0;
	while (++i < 4 && !(n_use = 0))
	{
		ref = (ref < (nk[i][0] + x) ? (nk[i][0] + x) : ref);
		ref = (ref < (nk[i][1] + y) ? (nk[i][1] + y) : ref);
	}
	i = -1;
	if ((int)ft_strlen((*map)[0]) > ref)
		while (++i < 4)
			if ((*map)[nk[i][0] + x][nk[i][1] + y] == '.')
				++n_use;
	return ((n_use == 4 && (nk[4][0] = 1)) ? 1 : 0);
}

static void		place_remove_bk(char ***map, int nk[5][2], int x, int y)
{
	int	i;

	i = -1;
	while (++i < 4)
		if (nk[4][0])
		{
			if ((*map)[nk[i][0] + x][nk[i][1] + y] == '.')
				(*map)[nk[i][0] + x][nk[i][1] + y] = 'A' + nk[4][1];
		}
		else
		{
			if ((*map)[nk[i][0] + x][nk[i][1] + y] == 'A' + nk[4][1])
				(*map)[nk[i][0] + x][nk[i][1] + y] = '.';
		}
}

int				solver(char **map, int itb[26][5][2], int n_bk, int ok)
{
	int i;
	int j;

	if (ok == n_bk)
		return (0);
	i = -1;
	while (map[++i] && (j = -1))
		while (map[i][++j])
			if (check_place_bk(&map, itb[ok], i, j))
			{
				place_remove_bk(&map, itb[ok], i, j);
				if (!solver(map, itb, n_bk, ok + 1))
					return (0);
				itb[ok][4][0] = 0;
				place_remove_bk(&map, itb[ok], i, j);
			}
	return (1);
}
