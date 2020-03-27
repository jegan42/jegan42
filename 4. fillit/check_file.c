/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   check_file.c                                       :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jeagan <jeagan@student.42.fr>              +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/05/11 08:38:16 by jeagan            #+#    #+#             */
/*   Updated: 2019/05/26 18:48:39 by jeagan           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "fill_it.h"

static int		ft_nbc(const char *s, char c)
{
	int		i;
	int		nbc;

	nbc = 0;
	if (s && (i = -1))
		while (s[++i])
			if (s[i] && (s[i] == c))
				++nbc;
	return (nbc);
}

static t_check	*check_file_init(char *s)
{
	t_check	*new;

	if (!(new = (t_check *)malloc(sizeof(t_check))))
		return ((t_check *)0);
	new->line = (char *)0;
	new->tab = (char **)0;
	new->ok_l = 0;
	new->touch_c = 0;
	new->use = 0;
	new->len = (int)(ft_strlen(s) - 20);
	new->i_b = (int)((ft_strlen(s) - 20) / 21);
	return (new);
}

static int		check_form(t_check *bk, char *line, int i, int j)
{
	if (ft_nbw(line, '.') != 1 && ft_nbw(line, '.') != 0)
		return (0);
	if (ft_nbc(line, '#') && !bk->ok_l)
	{
		bk->ok_l = i;
		bk->use += ft_nbc(line, '#');
	}
	else if (ft_nbc(line, '#') != 4 && bk->ok_l && bk->use != 4)
	{
		bk->use += ft_nbc(line, '#');
		if (!(ft_nbc(line, '#') && i - bk->ok_l == 1))
			return (0);
		bk->ok_l = i;
	}
	bk->touch_c = 0;
	while (i && line[++j] && bk->use)
		if (ft_nbc(line, '#') && ft_nbc(bk->tab[i - 1], '#')
			&& line[j] == '#')
			if (line[j] == bk->tab[i - 1][j])
				++bk->touch_c;
	if (i && bk->use <= 4 && ft_nbc(bk->tab[i - 1], '#') && ((ft_nbc(line, '#')
		&& !bk->touch_c) || !ft_nbc(line, '#')))
		return (0);
	return (1);
}

static void		stock_form_int(t_check *bk, int itb[26][5][2])
{
	int	i;
	int	j;

	i = -1;
	bk->use = 0;
	while (bk->tab[++i] && (j = -1))
		while (bk->tab[i][++j])
			if (bk->tab[i][j] == '#')
			{
				itb[bk->i_b][bk->use][0] = i;
				itb[bk->i_b][bk->use][1] = j;
				bk->use++;
			}
	j = -1;
	while (++j < 2)
		while (itb[bk->i_b][0][j] && itb[bk->i_b][1][j] && itb[bk->i_b][2][j]
			&& itb[bk->i_b][3][j] && (i = -1))
			while (++i < 4)
				itb[bk->i_b][i][j]--;
	itb[bk->i_b][4][0] = 0;
	itb[bk->i_b][4][1] = bk->i_b;
}

int				check_file(char *s, int itb[26][5][2])
{
	t_check	*bk;
	int		i;

	if (!(bk = check_file_init(s)) || (int)ft_strlen(s) > 545)
	{
		free(bk);
		return (0);
	}
	if ((i = -1) && 26 >= (bk->i_b) + 1 && (bk->i_b) + 1 > 0 && !(bk->len % 21))
	{
		if (!(bk->line = ft_strdup(&s[bk->len]))
			|| ft_nbc(bk->line, '\n') != 4 || ft_nbc(bk->line, '#') != 4
			|| bk->line[0] == '\n' || !(bk->tab = ft_strsplit(bk->line, '\n')))
			return (0);
		free(bk->line);
		while (bk->tab[++i] && bk->use != 4)
			if (!(check_form(bk, bk->tab[i], i, -1)))
				return (0);
		stock_form_int(bk, itb);
		free_tab(bk->tab, 0);
	}
	free(bk);
	return (1);
}
